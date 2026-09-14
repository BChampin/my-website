import { ref } from "vue";
import type { TpData, TpPlayer, TpTeam } from "./types";

const data = ref<TpData | null>(null);

if (typeof window !== "undefined") {
  fetch(`${import.meta.env.BASE_URL}json/rpg_tp.json`)
    .then((res) => res.json())
    .then((json: TpData) => (data.value = json))
    .catch((err: unknown) => console.error("Failed to load data:", err));
}

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
