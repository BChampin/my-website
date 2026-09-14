<template>
  <Card class="flex-none">
    <div class="text-lg font-semibold text-theme-6">{{ t("skillsSection") }}</div>
    <div v-for="(section, i) of portfolioData.skills" :key="i" class="mt-4">
      <div class="text-sm italic">{{ t("label", section) }}</div>
      <InfiniteCarousel :items="section.tools" />
    </div>
  </Card>
</template>

<script setup lang="ts">
import { Card, InfiniteCarousel } from "@my-website/ui";
import { t } from "../i18n";
import { portfolioData } from "../data";
</script>
