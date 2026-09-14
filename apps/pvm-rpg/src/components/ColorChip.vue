<template>
  <span
    v-if="color"
    class="inline-flex items-center rounded-full px-3 py-1 text-sm font-semibold whitespace-nowrap"
    :style="{ backgroundColor: color.hex, color: color.text === 'white' ? '#ffffff' : '#000000' }"
  >
    {{ color.label }}
  </span>
</template>

<script setup lang="ts">
defineProps<{
  color: { label: string; hex: string; text: "black" | "white" } | undefined;
}>();
</script>
