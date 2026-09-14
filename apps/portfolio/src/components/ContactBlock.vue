<template>
  <Card class="flex-none">
    <div class="text-lg font-semibold text-theme-6">{{ t("contact.title") }}</div>
    <p class="py-2">{{ t("contact.text") }}</p>
    <button
      type="button"
      class="flex items-center gap-2 rounded-[25px] px-3 py-1.5 transition-colors hover:bg-theme-8"
      @click="copyEmail"
    >
      {{ t("contact.cta") }}
      <span aria-hidden="true">📋</span>
    </button>
  </Card>
</template>

<script setup lang="ts">
import { Card } from "@my-website/ui";
import { t } from "../i18n";
import { portfolioData } from "../data";

async function copyEmail() {
  await navigator.clipboard.writeText(portfolioData.contact.email);
}
</script>
