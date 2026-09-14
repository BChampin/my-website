<template>
  <div class="grid grid-cols-3 gap-2 sm:grid-cols-6">
    <a
      :href="portfolioData.links.malt.href"
      target="_blank"
      rel="noopener"
      :title="portfolioData.links.malt.label"
      class="aspect-square"
    >
      <Card class="flex h-full w-full items-center justify-center !p-2">
        <img src="/logos/malt.svg" alt="Logo Malt" class="h-10" />
      </Card>
    </a>
    <a
      :href="portfolioData.links.github.href"
      target="_blank"
      rel="noopener"
      :title="portfolioData.links.github.label"
      class="aspect-square"
    >
      <Card class="flex h-full w-full items-center justify-center !p-2">
        <img src="/logos/github.svg" alt="Logo Github" class="h-10" />
      </Card>
    </a>
    <a
      :href="portfolioData.links.gitlab.href"
      target="_blank"
      rel="noopener"
      :title="portfolioData.links.gitlab.label"
      class="aspect-square"
    >
      <Card class="flex h-full w-full items-center justify-center !p-2">
        <img src="/logos/gitlab.svg" alt="Logo Gitlab" class="h-10" />
      </Card>
    </a>
    <div class="aspect-square" :title="t('lang.switch')">
      <LangSwitch :lang="lang" @switch="switchLang" />
    </div>
    <a
      :href="portfolioData.links.email.href"
      target="_blank"
      rel="noopener"
      :title="portfolioData.links.email.label"
      class="aspect-square"
    >
      <Card class="flex h-full w-full items-center justify-center !p-2 text-2xl text-theme-6"
        >✉️</Card
      >
    </a>
    <div class="aspect-square" :title="t(`dark.${isDark ? 'light' : 'dark'}`)">
      <ThemeToggle />
    </div>
  </div>
</template>

<script setup lang="ts">
import { Card, LangSwitch, ThemeToggle, useDarkMode } from "@my-website/ui";
import { t, lang, switchLang } from "../i18n";
import { portfolioData } from "../data";

const { isDark } = useDarkMode();
</script>
