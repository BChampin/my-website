<template>
  <Card class="flex flex-1 flex-col overflow-hidden">
    <div class="flex flex-wrap items-center justify-between gap-2">
      <div class="text-lg font-semibold text-theme-6">{{ t("about.title") }}</div>
      <div class="flex gap-1 rounded-[25px] border-2 border-theme-5 p-1 text-sm">
        <button
          v-for="id in ['experiences', 'studies'] as const"
          :key="id"
          type="button"
          class="rounded-[20px] px-3 py-1 transition-colors"
          :class="tab === id ? 'bg-theme-6 text-theme-7' : 'hover:bg-theme-8'"
          @click="tab = id"
        >
          {{ t(`about.${id}`) }}
        </button>
      </div>
    </div>
    <div class="mt-4 overflow-y-auto">
      <Timeline :items="portfolioData[tab]" :t="t" />
    </div>
  </Card>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Card, Timeline } from "@my-website/ui";
import { t } from "../i18n";
import { portfolioData } from "../data";

const tab = ref<"experiences" | "studies">("experiences");
</script>
