<template>
  <span
    class="inline-flex items-center rounded-full px-3 py-1 text-sm font-semibold whitespace-nowrap"
    :style="{ backgroundColor: grade.hex, color: grade.text === 'white' ? '#ffffff' : '#000000' }"
  >
    {{ grade.label }}
  </span>
</template>

<script setup lang="ts">
import type { MapGrade } from "../types";

defineProps<{
  grade: MapGrade;
}>();
</script>
