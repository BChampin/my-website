<template>
  <button
    type="button"
    :aria-label="`Switch language (current: ${lang})`"
    class="flex aspect-square w-full items-center justify-center rounded-[25px] border-2 border-theme-5 bg-theme-2 text-xl transition-colors hover:bg-theme-8"
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
