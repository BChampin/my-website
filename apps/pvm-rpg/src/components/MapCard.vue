<template>
  <a
    :href="map.exchange.link ?? 'https://trackmania.exchange/'"
    target="_blank"
    rel="noopener"
    class="group relative block h-[300px] overflow-hidden rounded-2xl border-2 border-theme-5 bg-theme-2 sm:h-[300px]"
  >
    <img
      v-if="map.exchange.thumbnail"
      :src="map.exchange.thumbnail"
      class="absolute inset-0 h-full w-full object-cover transition-transform group-hover:scale-105"
      alt=""
    />
    <div class="absolute inset-x-0 top-0 flex items-start justify-between gap-2 p-2">
      <GradeChip :grade="map.grade" />
      <MedalGroup :map="map" />
    </div>
    <div
      class="absolute inset-x-0 bottom-0 flex items-center justify-between gap-2 bg-gradient-to-t from-black/70 to-transparent p-3"
    >
      <div class="font-bold text-white">{{ map.label }}</div>
      <div class="text-sm text-white/80">{{ map.exchange.author?.name }}</div>
    </div>
  </a>
</template>

<script setup lang="ts">
import type { Map } from "../types";
import GradeChip from "./GradeChip.vue";
import MedalGroup from "./MedalGroup.vue";

defineProps<{
  map: Map;
}>();
</script>
