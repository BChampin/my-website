<template>
  <div class="pb-2 text-center text-2xl font-bold text-theme-3">
    {{ content }}
  </div>
</template>

<script setup lang="ts">
defineProps<{ content: string }>();
</script>
