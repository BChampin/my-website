<template>
  <ol class="flex flex-col">
    <li
      v-for="(item, i) of items"
      :key="i"
      class="grid grid-cols-[minmax(4.5rem,auto)_1fr] gap-4 border-b border-theme-5 py-4 first:pt-0 last:border-b-0"
    >
      <div class="text-sm text-theme-4">{{ item.dates }}</div>
      <div>
        <div class="font-semibold">{{ t("title", item) }}</div>
        <div class="text-sm text-theme-4">
          <a v-if="item.link" :href="item.link" target="_blank" rel="noopener" class="link">{{
            t("institution", item)
          }}</a>
          <span v-else>{{ t("institution", item) }}</span>
          <span v-if="item.location"> · {{ item.location }}</span>
        </div>
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
