<template>
  <component
    :is="linkable ? 'router-link' : 'span'"
    v-if="team"
    :to="linkable ? teamPath(team.id) : undefined"
    class="inline-flex items-center gap-2 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
    :class="{ 'hover:opacity-80': linkable }"
    :style="{ backgroundColor: colors.bg, color: colors.text, '--tw-ring-color': colors.ring }"
  >
    <span>{{ team.emoji }}</span>
    <span>{{ team.id }}</span>
  </component>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { teamPath } from "../router";
import { TEAM_COLOR_PALETTE } from "../types";
import type { TpTeam } from "../types";

const { team, linkable = true } = defineProps<{ team: TpTeam | undefined; linkable?: boolean }>();

const colors = computed(() => (team ? TEAM_COLOR_PALETTE[team.color] : TEAM_COLOR_PALETTE.rose));
</script>
