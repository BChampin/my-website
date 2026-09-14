<template>
  <svg
    :viewBox="`0 0 ${icon.icon[0]} ${icon.icon[1]}`"
    class="fill-current"
    :class="props.class"
    aria-hidden="true"
  >
    <path :d="path" />
  </svg>
</template>

<script setup lang="ts">
import { computed } from "vue";
import type { IconDefinition } from "@fortawesome/free-brands-svg-icons";

const props = defineProps<{
  icon: IconDefinition;
  class?: string;
}>();

// icon.icon[4] is the SVG path data — a single string for every brands icon
// used here (duotone icons use an array instead, not applicable to `fab`).
const path = computed(() => props.icon.icon[4] as string);
</script>
