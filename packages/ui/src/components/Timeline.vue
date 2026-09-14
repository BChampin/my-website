<template>
  <ol class="flex flex-col gap-4">
    <li v-for="(item, i) of items" :key="i" class="relative border-l-2 border-theme-5 pl-4">
      <span class="absolute top-1.5 -left-[7px] h-3 w-3 rounded-full bg-theme-6" />
      <div class="flex flex-wrap items-center gap-x-2 text-sm text-theme-4">
        <span>⏱ {{ t("dates", item) }}</span>
        <span>📍 {{ t("location", item) }}</span>
      </div>
      <div class="flex flex-wrap items-center gap-x-2">
        <span class="text-lg font-semibold">{{ t("title", item) }}</span>
        <span class="whitespace-nowrap">
          @
          <a v-if="item.link" :href="item.link" target="_blank" rel="noopener" class="link">{{
            t("institution", item)
          }}</a>
          <span v-else>{{ t("institution", item) }}</span>
        </span>
      </div>
    </li>
  </ol>
</template>

<script setup lang="ts">
import type { TimelineItem } from "../types";

defineProps<{
  items: TimelineItem[];
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  t: (path: string, source?: object) => any;
}>();
</script>
