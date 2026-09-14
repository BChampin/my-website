<template>
  <button
    type="button"
    :aria-label="isDark ? 'Switch to light mode' : 'Switch to dark mode'"
    class="ui-surface flex aspect-square w-full items-center justify-center text-xl transition-colors hover:bg-theme-8"
    @click="toggle"
  >
    {{ isDark ? "🌙" : "☀️" }}
  </button>
</template>

<script setup lang="ts">
import { useDarkMode } from "../composables/useDarkMode";

const { isDark, toggle } = useDarkMode();
</script>
