<template>
  <span
    v-if="team"
    class="inline-flex items-center gap-2 rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
    :style="{ backgroundColor: colors.bg, color: colors.text, '--tw-ring-color': colors.ring }"
  >
    <span>{{ team.emoji }}</span>
    <span>{{ team.id }}</span>
  </span>
</template>

<script setup lang="ts">
import { computed } from "vue";
import type { TeamColor, TpTeam } from "../types";

const props = defineProps<{ team: TpTeam | undefined }>();

// Tailwind's own -100/-700 palette shades, applied inline: a color picked at
// runtime from a lookup table isn't a literal `class="..."` Tailwind's
// content scanner can reliably pick up (confirmed: worked in a production
// build here, but silently produced colorless badges in dev — see
// GradeChip/FameChip in apps/pvm-rpg for the same pattern used for the same
// reason).
const PALETTE: Record<TeamColor, { bg: string; text: string; ring: string }> = {
  pink: { bg: "#fce7f3", text: "#be185d", ring: "rgb(190 24 93 / 0.1)" },
  yellow: { bg: "#fef9c3", text: "#a16207", ring: "rgb(161 98 7 / 0.1)" },
  blue: { bg: "#dbeafe", text: "#1d4ed8", ring: "rgb(29 78 216 / 0.1)" },
  red: { bg: "#fee2e2", text: "#b91c1c", ring: "rgb(185 28 28 / 0.1)" },
  emerald: { bg: "#d1fae5", text: "#047857", ring: "rgb(4 120 87 / 0.1)" },
  lime: { bg: "#ecfccb", text: "#4d7c0f", ring: "rgb(77 124 15 / 0.1)" },
  fuchsia: { bg: "#fae8ff", text: "#a21caf", ring: "rgb(162 28 175 / 0.1)" },
  rose: { bg: "#ffe4e6", text: "#be123c", ring: "rgb(190 18 60 / 0.1)" },
};

const colors = computed(() => (props.team ? PALETTE[props.team.color] : PALETTE.rose));
</script>
