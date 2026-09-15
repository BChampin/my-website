import { ref } from "vue";
import { rpgTpData } from "./rpg-tp.data";
import type { TpData, TpPlayer, TpTeam } from "./types";

const data = ref<TpData>(rpgTpData);

export function useRpgTpData() {
  return data;
}

// Shared "find by id" joins, used from several components' computeds so the
// lookup + null-handling only has to be written once.
export function findTeam(data: TpData | null, id: string | undefined): TpTeam | undefined {
  return id ? data?.teams.find((t) => t.id === id) : undefined;
}

export function findPlayer(data: TpData | null, id: string): TpPlayer | undefined {
  return data?.players.find((p) => p.id === id);
}
