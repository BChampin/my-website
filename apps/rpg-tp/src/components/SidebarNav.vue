<template>
  <router-link
    v-for="item of items"
    :key="item.to"
    :to="item.to"
    class="flex content-center items-center text-rpgtp-sidebar-text"
    :class="row ? 'w-full flex-row gap-2' : 'w-20 flex-col gap-1'"
    @click="emit('navigate')"
  >
    <Icon :name="item.icon" :class="row ? 'h-5 w-5' : 'h-6 w-6 sm:h-8 sm:w-8'" />
    <span v-if="labels" :class="row ? 'text-base font-bold' : 'text-xs font-medium'">{{
      item.label
    }}</span>
  </router-link>
</template>

<script setup lang="ts">
import { Paths } from "../router";
import Icon from "./Icon.vue";

withDefaults(defineProps<{ labels?: boolean; row?: boolean }>(), { labels: false, row: false });
const emit = defineEmits<{ navigate: [] }>();

const items = [
  { to: Paths.HOME, label: "Accueil", icon: "home" as const },
  { to: Paths.PLAYERS, label: "Joueurs", icon: "users" as const },
  { to: Paths.ORGA, label: "Orga", icon: "heart" as const },
];
</script>
