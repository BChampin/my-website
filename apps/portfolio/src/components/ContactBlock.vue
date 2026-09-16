<template>
  <section class="border-b border-theme-6/40 py-12 last:border-b-0">
    <h2 class="mb-4 text-xs font-semibold tracking-widest text-theme-4 uppercase">
      {{ t("contact.title") }}
    </h2>
    <p class="mb-4">{{ t("contact.text") }}</p>
    <button type="button" class="link" @click="copyEmail">
      {{ t("contact.cta") }}
    </button>
  </section>
</template>

<script setup lang="ts">
import { t } from "../i18n";
import { portfolioData } from "../data";

async function copyEmail() {
  await navigator.clipboard.writeText(portfolioData.contact.email);
}
</script>
