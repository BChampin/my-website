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

const cptMedals = computed(() => {
  let medals = ["noob", "intermediate", "challenger", "player", "alien", "wr", "noway"];

  if (props.map && props.time) {
    medals = [];
    if (props.map.times.noob > props.time) medals.push("noob");
    if (props.map.times.intermediate > props.time) medals.push("intermediate");
    if (props.map.times.challenger > props.time) medals.push("challenger");
    if (props.map.times.player > props.time) medals.push("player");
    if (props.map.times.alien > props.time) medals.push("alien");
    if (props.map.times.wr > props.time) medals.push("wr");
    if (props.map.times.noway > props.time) medals.push("noway");
  }
  return medals.map((str) => getLevel(str));
});
</script>
