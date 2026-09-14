<template>
  <button
    type="button"
    class="flex w-full flex-row content-center items-center gap-2 text-rpgtp-sidebar-text"
    @click="toggleMuted"
  >
    <Icon :name="muted ? 'bell-slash' : 'bell'" class="h-5 w-5 sm:h-8 sm:w-8" />
    <span v-if="labels" class="text-base font-bold">{{ muted ? "Silencieux" : "Son activé" }}</span>
  </button>
  <button
    type="button"
    class="flex w-full flex-row content-center items-center gap-2 text-rpgtp-sidebar-text"
    @click="toggleColorblind"
  >
    <Icon :name="colorblind ? 'eye-slash' : 'eye'" class="h-5 w-5 sm:h-8 sm:w-8" />
    <span v-if="labels" class="text-base font-bold">{{
      colorblind ? "Mode daltonien" : "Mode par défaut"
    }}</span>
  </button>
  <button
    type="button"
    class="flex w-full flex-row content-center items-center gap-2 text-rpgtp-sidebar-text"
    @click="toggle"
  >
    <Icon :name="isDark ? 'moon' : 'sun'" class="h-5 w-5 sm:h-8 sm:w-8" />
    <span v-if="labels" class="text-base font-bold">{{
      isDark ? "Mode sombre" : "Mode clair"
    }}</span>
  </button>
</template>

<script setup lang="ts">
import { useDarkMode } from "@my-website/ui";
import { useRpgTpSettings } from "../settings";
import Icon from "./Icon.vue";

withDefaults(defineProps<{ labels?: boolean }>(), { labels: false });

const { isDark, toggle } = useDarkMode();
const { colorblind, toggleColorblind, muted, toggleMuted } = useRpgTpSettings();
</script>
