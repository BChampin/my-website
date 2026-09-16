<template>
  <header class="sticky top-0 z-10 border-b border-theme-5 bg-theme-1/90 backdrop-blur">
    <div class="mx-auto flex max-w-3xl items-center justify-between gap-4 px-4 py-3 sm:px-6">
      <nav class="hidden gap-4 text-sm whitespace-nowrap sm:flex">
        <a v-for="section in sections" :key="section.id" :href="`#${section.id}`" class="link">
          {{ t(section.labelKey) }}
        </a>
      </nav>
      <div class="flex shrink-0 items-center gap-2">
        <a
          :href="portfolioData.links.github.href"
          target="_blank"
          rel="noopener"
          :title="portfolioData.links.github.label"
          class="flex h-8 w-8 cursor-pointer items-center justify-center"
        >
          <img src="/logos/github.svg" alt="GitHub" class="github-icon h-5 w-5" />
        </a>
        <div :title="t('lang.switch')">
          <LangSwitch
            :lang="lang"
            class="h-8 w-8 cursor-pointer !border-0 text-sm"
            @switch="switchLang"
          />
        </div>
        <div :title="t(`dark.${isDark ? 'light' : 'dark'}`)">
          <ThemeToggle class="h-8 w-8 cursor-pointer !border-0 text-sm" />
        </div>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { LangSwitch, ThemeToggle, useDarkMode } from "@my-website/ui";
import { t, lang, switchLang } from "../i18n";
import { portfolioData } from "../data";

const { isDark } = useDarkMode();

const sections = [
  { id: "experience", labelKey: "nav.experience" },
  { id: "projects", labelKey: "nav.projects" },
  { id: "experiments", labelKey: "nav.experiments" },
  { id: "skills", labelKey: "nav.skills" },
  { id: "contact", labelKey: "nav.contact" },
] as const;
</script>

<style scoped>
[data-theme="dark"] .github-icon {
  filter: invert(1);
}
</style>
