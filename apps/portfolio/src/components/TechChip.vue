<template>
  <a
    :href="href"
    target="_blank"
    rel="noopener"
    class="inline-flex cursor-pointer items-center gap-1.5 rounded-full border border-theme-5 px-2.5 py-1 text-sm transition-colors hover:border-theme-6 hover:text-theme-6"
  >
    <img :src="icon" :alt="label" class="h-4 w-4 shrink-0" />
    <span>{{ label }}</span>
  </a>
</template>

<script setup lang="ts">
defineProps<{ href: string; icon: string; label: string }>();
</script>
