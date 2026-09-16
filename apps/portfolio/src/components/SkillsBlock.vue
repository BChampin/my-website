<template>
  <section class="border-b border-theme-6/40 py-12 last:border-b-0">
    <h2 class="mb-6 text-xs font-semibold tracking-widest text-theme-4 uppercase">
      {{ t("skillsSection") }}
    </h2>
    <div v-for="(section, i) of portfolioData.skills" :key="i" class="mt-6 first:mt-0">
      <div class="mb-2 text-sm text-theme-4 italic">{{ t("label", section) }}</div>
      <div class="flex flex-wrap gap-2">
        <TechChip
          v-for="(tool, ti) of section.tools"
          :key="ti"
          :href="tool.link"
          :icon="tool.icon"
          :label="tool.label"
        />
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import TechChip from "./TechChip.vue";
import { t } from "../i18n";
import { portfolioData } from "../data";
</script>
