<template>
  <span
    v-if="fame"
    class="inline-flex items-center rounded-full px-3 py-1 text-sm font-semibold whitespace-nowrap"
    :style="{ backgroundColor: fame.hex, color: fame.text === 'white' ? '#ffffff' : '#000000' }"
  >
    {{ fame.label }}
  </span>
</template>

<script setup lang="ts">
import type { Fame } from "../types";

defineProps<{
  fame: Fame | undefined;
}>();
</script>
