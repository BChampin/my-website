<template>
  <section class="border-b border-theme-6/40 py-12 last:border-b-0">
    <h2 class="mb-6 text-xs font-semibold tracking-widest text-theme-4 uppercase">
      {{ t("experimentsSection.title") }}
    </h2>
    <ProjectGrid :projects="portfolioData.experiments" />
  </section>
</template>

<script setup lang="ts">
import ProjectGrid from "./ProjectGrid.vue";
import { t } from "../i18n";
import { portfolioData } from "../data";
</script>
