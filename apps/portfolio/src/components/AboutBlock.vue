<template>
  <section v-reveal class="border-b border-theme-6/40 py-12 last:border-b-0">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-2">
      <h2 class="text-xs font-semibold tracking-widest text-theme-4 uppercase">
        {{ t("about.title") }}
      </h2>
      <div class="flex gap-4 text-sm">
        <button
          v-for="id in ['experiences', 'studies'] as const"
          :key="id"
          type="button"
          class="cursor-pointer transition-colors"
          :class="tab === id ? 'text-theme-6' : 'text-theme-4 hover:text-theme-3'"
          @click="tab = id"
        >
          {{ t(`about.${id}`) }}
        </button>
      </div>
    </div>
    <Timeline :items="portfolioData[tab]" :t="t" />
  </section>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Timeline } from "@my-website/ui";
import { t } from "../i18n";
import { portfolioData } from "../data";

const tab = ref<"experiences" | "studies">("experiences");
</script>
