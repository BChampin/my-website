import { ref } from "vue";
import type { TpData } from "./types";

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
