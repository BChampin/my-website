<template>
  <div
    v-if="map"
    class="relative -top-1 h-10"
    :style="{ width: `${cptMedals.length * 20 + 20}px` }"
  >
    <MedalComponent
      v-for="(medal, index) of cptMedals"
      :key="index"
      :level="medal"
      :map="map"
      class="absolute"
      :style="{ right: `${(cptMedals.length - 1 - index) * 20}px` }"
    />
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import type { Map } from "../types";
import { getLevel } from "../types";
import MedalComponent from "./MedalComponent.vue";

const props = defineProps<{
  map?: Map;
  time?: number;
}>();

// Single source of truth for medal order (worst to best), used both as the
// "all levels" default and to derive which levels a given time earns.
const MEDAL_ORDER = [
  "noob",
  "intermediate",
  "challenger",
  "player",
  "alien",
  "wr",
  "noway",
] as const;

const cptMedals = computed(() => {
  const map = props.map;
  const time = props.time;
  const medals = map && time ? MEDAL_ORDER.filter((level) => map.times[level] > time) : MEDAL_ORDER;
  return medals.map((str) => getLevel(str));
});
</script>
