<template>
  <button
    type="button"
    :aria-label="`Switch language (current: ${lang})`"
    class="ui-surface flex aspect-square w-full items-center justify-center text-xl transition-colors hover:bg-theme-8"
    @click="emit('switch')"
  >
    {{ labels[lang] ?? lang }}
  </button>
</template>

<script setup lang="ts">
withDefaults(
  defineProps<{
    lang: string;
    labels?: Record<string, string>;
  }>(),
  {
    labels: () => ({ fr: "🇫🇷", en: "🇬🇧" }),
  },
);

const emit = defineEmits<{ switch: [] }>();
</script>
