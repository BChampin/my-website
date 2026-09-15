import { ref } from "vue";
import { defineStore } from "pinia";
import type {
  Exchange,
  FameSlot,
  Map,
  Player,
  PlayerCategory,
  SheetCell,
  SheetData,
  TimeCategory,
  TimeRecord,
} from "../types";
import { buildFame, getMapGrade } from "../types";
import { getMapFromName, timeStrToNumber, uniqueStr } from "../utils";

export const useSheetStore = defineStore("sheet", () => {
  // Sheet
  const SHEET_URL =
    "https://docs.google.com/spreadsheets/d/1z1n6LfHMskAzD4N6CTNrnhyjFtgN_54TGlAyoU6eOnk/gviz/tq?tqx=out:json&headers=0&sheet=";
  const SHEET_URL_HTML =
    "https://docs.google.com/spreadsheets/u/0/d/1z1n6LfHMskAzD4N6CTNrnhyjFtgN_54TGlAyoU6eOnk/htmlview";
  const SHEET_NAMES = [
    "PvM (Aliens)",
    "PvM (Players 1)",
    "PvM (Players 2)",
    "PvM (Players 3)",
    "PvM (Novice)",
    "PvM (Novice 2)",
    "PvM (Novice 3)",
  ];
  const sheetData = ref<SheetData[]>([]);
  const loading = ref({
    maps: true,
    players: true,
    timeRecords: true,
  });
  const error = ref(false);
  const fetchSheetData = async (sheetName: string) => {
    try {
      const response = await fetch(`${SHEET_URL}${sheetName}`);
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const text = await response.text();
      const json = JSON.parse(text.substring(47).slice(0, -2));
      return json;
    } catch (err: unknown) {
      console.error(err);
    }
  };

  // Short-lived cache so navigating between pages (or reloading) within the
  // same tab doesn't re-fetch all 8 sheets every time — new player times still
  // show up within CACHE_TTL_MS of being submitted to the live sheet.
  const CACHE_KEY = "pvm-rpg:sheet-data";
  const CACHE_TTL_MS = 5 * 60 * 1000;
  type SheetCache = { timestamp: number; sheetData: SheetData[]; fameJson: SheetData };
  const readCache = (): SheetCache | undefined => {
    try {
      const raw = sessionStorage.getItem(CACHE_KEY);
      if (!raw) return undefined;
      const cached = JSON.parse(raw) as SheetCache;
      if (Date.now() - cached.timestamp > CACHE_TTL_MS) return undefined;
      return cached;
    } catch {
      return undefined;
    }
  };
  const writeCache = (cache: SheetCache) => {
    try {
      sessionStorage.setItem(CACHE_KEY, JSON.stringify(cache));
    } catch {
      // sessionStorage may be unavailable (private browsing, quota) — caching is best-effort
    }
  };

  const init = async () => {
    if (sheetData.value.length) return true;

    loading.value.maps = true;
    loading.value.players = true;
    loading.value.timeRecords = true;
    error.value = false;

    try {
      const cached = readCache();
      if (cached) {
        sheetData.value = cached.sheetData;
        await mapMaps();
        await mapPlayersAndTimes(Promise.resolve(cached.fameJson));
        return true;
      }

      const fetchPromises = SHEET_NAMES.map((sheetName) => fetchSheetData(sheetName));
      // Kicked off alongside the other sheets so it fetches in parallel; only
      // awaited later, right where mapPlayersAndTimes needs it.
      const fameJsonPromise = fetchSheetData("Wall of Fame");
      // Array of data for each sheet
      sheetData.value = await Promise.all(fetchPromises);
      await mapMaps();
      await mapPlayersAndTimes(fameJsonPromise);
      writeCache({
        timestamp: Date.now(),
        sheetData: sheetData.value,
        fameJson: await fameJsonPromise,
      });
      return true;
    } catch (err) {
      console.error("Error fetching all sheets data:", err);
      error.value = true;
    }
  };

  const retry = () => {
    sheetData.value = [];
    void init();
  };

  // TM data
  const maps = ref<Map[]>([]);
  const players = ref<Player[]>([]);
  const timeRecords = ref<TimeRecord[]>([]);
  const mapMaps = async () => {
    try {
      loading.value.maps = true;

      const alienJson = sheetData.value[0];
      const noviceJson = sheetData.value[4];
      if (
        !alienJson ||
        !noviceJson ||
        !alienJson.table.rows[0] ||
        !alienJson.table.rows[1] ||
        !alienJson.table.rows[2] ||
        !alienJson.table.rows[3] ||
        !alienJson.table.rows[4] ||
        !alienJson.table.rows[5] ||
        !alienJson.table.rows[6] ||
        !noviceJson.table.rows[3] ||
        !noviceJson.table.rows[4]
      )
        throw new Error("No data found");

      maps.value = alienJson.table.rows[2].c
        .map((cell: SheetCell, cellIndex: number): Map | undefined => {
          if (cellIndex <= 1 || !cell || !cell.v) return undefined;
          let mapGrade;
          for (let gradeIndex = cellIndex; gradeIndex >= 2; gradeIndex--) {
            const grade = alienJson.table.rows[1]?.c[gradeIndex]?.v;
            if (grade) {
              mapGrade = getMapGrade(grade);
              break;
            }
          }

          // Building exchange object
          const exchange: Exchange = {};
          let link = alienJson.table.rows[7]?.c[cellIndex]?.v ?? undefined;
          if (link) {
            // Special not properly formatted links
            if (link === "https://trackmania.exchange/tracks/view/205627/rpg-inside") {
              link = "https://trackmania.exchange/maps/205627/rpg-inside";
            } else if (link === "https://trackmania.exchange/tracks/view/117963") {
              link = "https://trackmania.exchange/maps/117963/rpg-quandary-islands";
            }

            exchange.link = link;
            const match = link.match(new RegExp(/\/maps\/(\d+)\//));
            if (match && match[1]) {
              const id = Number(match[1]);
              exchange.id = id;
              exchange.thumbnail = `https://trackmania.exchange/mapimage/${id}`;
            }
          }
          return {
            label: cell.v,
            grade: mapGrade ?? getMapGrade("E"),
            times: {
              noway: alienJson.table.rows[6]?.c[cellIndex]?.v
                ? timeStrToNumber(alienJson.table.rows[6]?.c[cellIndex].v)
                : 9999999,
              wr: alienJson.table.rows[5]?.c[cellIndex]?.v
                ? timeStrToNumber(alienJson.table.rows[5]?.c[cellIndex].v)
                : 9999999,
              alien: alienJson.table.rows[4]?.c[cellIndex]?.v
                ? timeStrToNumber(alienJson.table.rows[4]?.c[cellIndex].v)
                : 9999999,
              player: alienJson.table.rows[3]?.c[cellIndex]?.v
                ? timeStrToNumber(alienJson.table.rows[3].c[cellIndex].v)
                : 9999999,
              challenger: noviceJson.table.rows[5]?.c[cellIndex]?.v
                ? timeStrToNumber(noviceJson.table.rows[5]?.c[cellIndex].v)
                : 9999999,
              intermediate: noviceJson.table.rows[4]?.c[cellIndex]?.v
                ? timeStrToNumber(noviceJson.table.rows[4]?.c[cellIndex].v)
                : 9999999,
              noob: noviceJson.table.rows[3]?.c[cellIndex]?.v
                ? timeStrToNumber(noviceJson.table.rows[3]?.c[cellIndex].v)
                : 9999999,
            },
            exchange,
            tag: alienJson.table.rows[0]?.c[cellIndex]?.v ?? undefined,
          } as Map;
        })
        .filter((map): map is Map => map !== undefined);

      return maps;
    } catch (err) {
      console.error("Error mapping maps:", err);
      error.value = true;
    } finally {
      loading.value.maps = false;
    }
  };
  const mapPlayersAndTimes = async (fameJsonPromise: ReturnType<typeof fetchSheetData>) => {
    try {
      loading.value.players = true;
      loading.value.timeRecords = true;

      if (!sheetData.value[0] || !sheetData.value[0].table.rows[2])
        throw new Error("No data found");

      // Gather maps
      const mapsIdFromCol: { [key: number]: Map } = {};
      for (const [mapColIndex, mapName] of sheetData.value[0].table.rows[2].c.entries()) {
        if (mapName && mapName.v) {
          const map = getMapFromName(maps.value, mapName.v);
          if (map) mapsIdFromCol[mapColIndex] = map;
        }
      }

      // Setup
      const playersTmp: Player[] = [];
      const timeRegex = /^\d{2,3}:\d{2}\.\d{3}$/;
      const playersCategories = [
        "Alien",
        "Player",
        "Player",
        "Player",
        "Novice",
        "Novice",
        "Novice",
      ];

      for (let sheetIndex = 0; sheetIndex < sheetData.value.length; sheetIndex++) {
        const sheet = sheetData.value[sheetIndex];
        if (!sheet) continue;
        for (const [rowIndex, row] of sheet.table.rows.entries()) {
          if (
            rowIndex < (sheetIndex ? 7 : 9) /* Alien skips more rows */ ||
            !row.c[1]?.v ||
            row.c[1]?.v === "/"
          )
            continue; // Skip header or empty row
          const playerId = uniqueStr();
          const player: Player = {
            name: row.c[1].v,
            category: playersCategories[sheetIndex] as PlayerCategory,
            id: playerId,
            rawFame: {},
            fames: {},
            nbRecords: 0,
          };
          playersTmp.push(player);
          for (const [cellColIndex, cell] of row.c.entries()) {
            if (cell && cell.v && cellColIndex > 1) {
              const currentMap: Map | undefined = mapsIdFromCol[cellColIndex];
              if (!timeRegex.test(cell.v) || !currentMap) continue;
              const time = timeStrToNumber(cell.v);
              const mapCategory = [
                "No Way",
                "World Record",
                "Alien",
                "Player",
                "Challenger",
                "Intermediate",
                "Noob",
                "Not defined",
              ][
                [
                  currentMap.times.noway,
                  currentMap.times.wr,
                  currentMap.times.alien,
                  currentMap.times.player,
                  currentMap.times.challenger,
                  currentMap.times.intermediate,
                  currentMap.times.noob,
                ].findIndex((threshold) => time < threshold) ?? 4
              ];
              timeRecords.value.push({
                playerId,
                mapId: currentMap.exchange.id ?? 0,
                time,
                category: mapCategory as TimeCategory,
              });
            }
          }
        }
      }

      loading.value.players = false;

      // Getting fame. The sheet's own "Rang" column (c[10]/c[11]) is the
      // authoritative label -> level table ("F" -> 0, "E 14" -> 1, ... "GOD"
      // -> 113) — read live rather than hardcoded, since it has changed
      // shape since this app was first built.
      const fameJson = await fameJsonPromise;
      const rangMap: Record<string, number> = {};
      for (const row of fameJson.table.rows) {
        const rank = row.c[10]?.v;
        const rangLabel = row.c[11]?.v;
        if (rank !== null && rank !== undefined && rangLabel) {
          const level = Number(rank);
          if (!Number.isNaN(level)) rangMap[rangLabel] = level;
        }
      }
      for (const [rowIndex, row] of fameJson.table.rows.entries()) {
        if (rowIndex && !row.c[1] && !row.c[5]) continue; // Quick shutp up ts with rowIndex
        const playerLeft = row.c[1] ? row.c[1].v : "/";
        const playerRight = row.c[5] ? row.c[5].v : "/";
        if (playerLeft === "/" && playerRight === "/") continue;

        if (playerLeft !== "/") {
          const findPlayerIndex = playersTmp.findIndex((p) => p.name === playerLeft);
          if (findPlayerIndex >= 0) {
            playersTmp[findPlayerIndex]!.rawFame = {
              player: row.c[2]?.v ?? undefined,
              alien: row.c[3]?.v ?? undefined,
            };
          }
        }

        if (playerRight !== "/") {
          const findPlayerIndex = playersTmp.findIndex((p) => p.name === playerRight);
          if (findPlayerIndex >= 0) {
            playersTmp[findPlayerIndex]!.rawFame = {
              noob: row.c[6]?.v ?? undefined,
              intermediate: row.c[7]?.v ?? undefined,
              challenger: row.c[8]?.v ?? undefined,
            };
          }
        }
      }

      // rawFame is the raw Wall of Fame label per category — convert it to
      // actual Fame data here, and derive each player's completed-map count
      // from timeRecords, since neither was ever computed on the live site.
      const recordCountByPlayerId = new Map<string, number>();
      for (const tr of timeRecords.value) {
        recordCountByPlayerId.set(tr.playerId, (recordCountByPlayerId.get(tr.playerId) ?? 0) + 1);
      }
      players.value = playersTmp.map((player) => {
        const fames: Player["fames"] = {};
        for (const [slot, raw] of Object.entries(player.rawFame) as [
          FameSlot,
          string | undefined,
        ][]) {
          if (raw === undefined) continue;
          const level = rangMap[raw];
          if (level !== undefined) fames[slot] = buildFame(raw, level);
        }
        return {
          ...player,
          fames,
          nbRecords: recordCountByPlayerId.get(player.id) ?? 0,
        };
      });
    } catch (err) {
      console.error("Error mapping players and times:", err);
      error.value = true;
    } finally {
      loading.value.players = false;
      loading.value.timeRecords = false;
    }
  };

  return {
    // Sheet
    SHEET_URL_HTML,
    loading,
    error,
    init,
    retry,

    // TM data
    maps,
    players,
    timeRecords,
  };
});
