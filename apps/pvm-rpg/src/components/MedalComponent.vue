<template>
  <img
    :src="publicUrl(`images/${level.icon}.png`)"
    :title="`${level.label}${map ? ` - ${timeNumberToStr(map.times[level.level])}` : ''}`"
    class="h-10 w-10 rounded-full border-2 border-theme-2 bg-theme-2 object-contain shadow"
  />
</template>

<script setup lang="ts">
import type { Level, Map } from "../types";
import { timeNumberToStr } from "../utils";
import { publicUrl } from "../publicUrl";

defineProps<{
  map?: Map;
  level: Level;
}>();
</script>
