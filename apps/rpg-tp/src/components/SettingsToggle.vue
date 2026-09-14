<template>
  <button
    v-for="item of items"
    :key="item.key"
    type="button"
    class="flex w-full flex-row content-center items-center gap-2 text-rpgtp-sidebar-text"
    @click="item.onClick"
  >
    <Icon :name="item.icon" class="h-5 w-5 sm:h-8 sm:w-8" />
    <span v-if="labels" class="text-base font-bold">{{ item.label }}</span>
  </button>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useDarkMode } from "@my-website/ui";
import { useRpgTpSettings } from "../settings";
import Icon from "./Icon.vue";

withDefaults(defineProps<{ labels?: boolean }>(), { labels: false });

const { isDark, toggle: toggleDark } = useDarkMode();
const { colorblind, toggleColorblind, muted, toggleMuted } = useRpgTpSettings();

const items = computed(
  () =>
    [
      {
        key: "muted",
        icon: muted.value ? "bell-slash" : "bell",
        label: muted.value ? "Silencieux" : "Son activé",
        onClick: toggleMuted,
      },
      {
        key: "colorblind",
        icon: colorblind.value ? "eye-slash" : "eye",
        label: colorblind.value ? "Mode daltonien" : "Mode par défaut",
        onClick: toggleColorblind,
      },
      {
        key: "dark",
        icon: isDark.value ? "moon" : "sun",
        label: isDark.value ? "Mode sombre" : "Mode clair",
        onClick: toggleDark,
      },
    ] as const,
);
</script>
