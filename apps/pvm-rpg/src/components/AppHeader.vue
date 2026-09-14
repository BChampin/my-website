<template>
  <header class="sticky top-0 z-20 border-b-2 border-theme-5 bg-theme-2">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 p-3">
      <router-link :to="{ name: 'home' }" class="link flex items-center gap-3 !no-underline">
        <img :src="publicUrl('images/favicon.png')" class="h-10 w-10" alt="" />
        <span class="text-lg font-extrabold text-theme-4">PVM-RPG</span>
      </router-link>

      <nav class="hidden items-center gap-5 sm:flex">
        <router-link
          v-for="link of navLinks"
          :key="link.to.name"
          :to="link.to"
          class="flex items-center gap-1 font-bold text-theme-4 uppercase hover:text-theme-6"
        >
          <Icon :name="link.icon" class="h-4 w-4" />
          {{ link.label }}
        </router-link>
        <a
          :href="store.SHEET_URL_HTML"
          target="_blank"
          rel="noopener"
          class="flex items-center gap-1 font-bold text-theme-4 uppercase hover:text-theme-6"
        >
          <Icon name="link" class="h-4 w-4" />
          GSheet
        </a>
        <div class="flex items-center gap-2">
          <div class="h-9 w-9" :title="isDark ? 'Light mode' : 'Dark mode'">
            <ThemeToggle />
          </div>
          <div class="h-9 w-9" :title="`Switch language (${lang})`">
            <LangSwitch :lang="lang" @switch="switchLang" />
          </div>
        </div>
      </nav>

      <button
        type="button"
        class="flex h-9 w-9 items-center justify-center rounded-[25px] border-2 border-theme-5 sm:hidden"
        aria-label="Menu"
        @click="mobileOpen = !mobileOpen"
      >
        <Icon name="menu" class="h-5 w-5" />
      </button>
    </div>

    <div v-if="mobileOpen" class="flex flex-col gap-3 border-t-2 border-theme-5 p-3 sm:hidden">
      <router-link
        v-for="link of navLinks"
        :key="link.to.name"
        :to="link.to"
        class="flex items-center gap-2 font-bold text-theme-4 uppercase"
        @click="mobileOpen = false"
      >
        <Icon :name="link.icon" class="h-4 w-4" />
        {{ link.label }}
      </router-link>
      <a
        :href="store.SHEET_URL_HTML"
        target="_blank"
        rel="noopener"
        class="flex items-center gap-2 font-bold text-theme-4 uppercase"
      >
        <Icon name="link" class="h-4 w-4" />
        GSheet
      </a>
      <div class="flex items-center gap-2">
        <div class="h-9 w-9"><ThemeToggle /></div>
        <div class="h-9 w-9"><LangSwitch :lang="lang" @switch="switchLang" /></div>
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { LangSwitch, ThemeToggle, useDarkMode } from "@my-website/ui";
import { useSheetStore } from "../stores/sheet";
import { lang, switchLang, t } from "../i18n";
import { publicUrl } from "../publicUrl";
import Icon from "./Icon.vue";

const store = useSheetStore();
const { isDark } = useDarkMode();
const mobileOpen = ref(false);

const navLinks = computed(() => [
  { to: { name: "home" }, label: t("nav.home"), icon: "home" as const },
  { to: { name: "maps" }, label: t("nav.maps"), icon: "flag" as const },
  { to: { name: "players" }, label: t("nav.players"), icon: "users" as const },
]);
</script>
