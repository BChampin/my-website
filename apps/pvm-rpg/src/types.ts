export const MapGradeOptions = {
  E: { hex: "#d9ead3", text: "black", level: 0 },
  D: { hex: "#93c47d", text: "black", level: 1 },
  C: { hex: "#c9daf8", text: "black", level: 2 },
  B: { hex: "#6d9eeb", text: "white", level: 3 },
  A: { hex: "#fff2cc", text: "black", level: 4 },
  S: { hex: "#f6b26b", text: "black", level: 5 },
  SS: { hex: "#ff0000", text: "black", level: 6 },
  // Astral/Tryharder: added to the sheet after the original app was built.
  Astral: { hex: "#990000", text: "white", level: 7 },
  Tryharder: { hex: "#660000", text: "white", level: 8 },
  Legend: { hex: "#cc0000", text: "black", level: 9 },
  Abyssal: { hex: "#cc0000", text: "black", level: 10 },
  Omniscient: { hex: "#b4a7d6", text: "white", level: 11 },
  Divin: { hex: "#8e7cc3", text: "black", level: 12 },
  God: { hex: "#000000", text: "white", level: 13 },
  "No life": { hex: "#20124d", text: "white", level: 14 },
} as const;

export type MapGrade = {
  label: keyof typeof MapGradeOptions;
  hex: string;
  text: "black" | "white";
  level: number;
};

// The sheet's grade cells are like "E (LEVEL 1)" — strip the suffix before
// matching. Falls back to "E" for anything unrecognized, rather than
// throwing, since this reads live spreadsheet data that can change shape.
export function getMapGrade(rawLabel: string): MapGrade {
  const label = rawLabel.replace(/\s*\(.*\)\s*$/, "").trim() as keyof typeof MapGradeOptions;
  const data = MapGradeOptions[label] ?? MapGradeOptions.E;
  const resolvedLabel = MapGradeOptions[label] ? label : "E";
  return { label: resolvedLabel, ...data };
}

export type Author = {
  id: number;
  name: string;
};

export type Exchange = {
  link?: string;
  id?: number;
  author?: Author;
  thumbnail?: string;
  awardCount?: number;
};

export type Map = {
  label: string;
  grade: MapGrade;
  times: {
    noway: number;
    wr: number;
    alien: number;
    player: number;
    challenger: number;
    intermediate: number;
    noob: number;
  };
  exchange: Exchange;
  tag?: string;
};

export type FameSlot = "noway" | "wr" | "alien" | "player" | "challenger" | "intermediate" | "noob";

export type Player = {
  id: string;
  name: string;
  rawFame: Partial<Record<FameSlot, string>>;
  fames: Partial<Record<FameSlot, Fame>>;
  category: PlayerCategory;
  nbRecords: number;
};

export type PlayerCategory = "Alien" | "Player" | "Novice";

// The Wall of Fame sheet's "Rang" column (read at runtime, see stores/sheet.ts)
// is the authoritative label -> level table: labels are like "F", "E 14",
// down to "E 1", then "D 14".."D 1", etc, up through "Divin 1", "No Life",
// "GOD". Colored here by base tier (the leading word, number stripped), on
// the same gradient as the map grades.
const FAME_TIER_COLORS: Record<string, { hex: string; text: "black" | "white" }> = {
  F: { hex: "#757575", text: "white" },
  E: { hex: "#d9ead3", text: "black" },
  D: { hex: "#93c47d", text: "black" },
  C: { hex: "#c9daf8", text: "black" },
  B: { hex: "#6d9eeb", text: "white" },
  A: { hex: "#fff2cc", text: "black" },
  S: { hex: "#f6b26b", text: "black" },
  SS: { hex: "#ff0000", text: "white" },
  Divin: { hex: "#8e7cc3", text: "black" },
  "No Life": { hex: "#20124d", text: "white" },
  GOD: { hex: "#000000", text: "white" },
};

export type Fame = {
  level: number;
  label: string;
  hex: string;
  text: "black" | "white";
};

export function buildFame(label: string, level: number): Fame {
  const tier = label.replace(/\s+\d+$/, "").trim();
  const color = FAME_TIER_COLORS[tier] ?? { hex: "#888888", text: "black" as const };
  return { level, label, hex: color.hex, text: color.text };
}

export type TimeRecord = {
  playerId: string;
  mapId: number;
  time: number;
  category?: TimeCategory;
};

export type TimeCategory = "Alien" | "Player" | "Intermediate" | "Noob" | "Not defined";

const LevelOptions = {
  noway: { label: "No Way", icon: "noway" },
  wr: { label: "World Record", icon: "wr" },
  alien: { label: "Alien", icon: "alien" },
  player: { label: "Player", icon: "player" },
  challenger: { label: "Challenger", icon: "challenger" },
  intermediate: { label: "Intermediate", icon: "intermediate" },
  noob: { label: "Noob", icon: "noob" },
} as const;

export type Level = {
  level: keyof typeof LevelOptions;
  label: (typeof LevelOptions)[keyof typeof LevelOptions]["label"];
  icon: (typeof LevelOptions)[keyof typeof LevelOptions]["icon"];
};

export function getLevel(lvl: string): Level {
  const level = lvl as keyof typeof LevelOptions;
  const levelData = LevelOptions[level];
  return { level, ...levelData };
}

export type SheetCell = null | { v: string | null };

type SheetRow = SheetCell[];

export type SheetData = {
  table: {
    cols: { id: string; label: string; type: string }[];
    rows: {
      c: SheetRow;
    }[];
  };
};
