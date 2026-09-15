<template>
  <component
    :is="time.replay ? 'a' : 'div'"
    :href="time.replay"
    :target="time.replay ? '_blank' : undefined"
    :rel="time.replay ? 'noopener noreferrer' : undefined"
    class="m-1 flex items-center gap-2 rounded-full bg-theme-2 p-1 text-theme-3 shadow"
  >
    <img
      :src="playerImageUrl(player.id)"
      :alt="`${player.name} picture`"
      class="h-8 w-8 rounded-full object-cover"
    />
    <div class="hidden sm:flex">
      <TeamBadge :team="badgeTeam" :linkable="false" />
    </div>
    <span class="font-medium">{{ player.name }}</span>
    <span class="text-sm text-theme-4">{{ time.time }}</span>
    <span v-if="time.replay" class="flex items-center text-sm text-theme-4">
      <span class="hidden sm:flex">Replay</span>
      <Icon name="video" class="ml-1 h-5 w-5" />
    </span>
  </component>
</template>

<script setup lang="ts">
import { computed } from "vue";
import type { TpPlayer, TpTeam, TpTime } from "../types";
import { findTeam, useRpgTpData } from "../data";
import { playerImageUrl } from "../publicUrl";
import TeamBadge from "./TeamBadge.vue";
import Icon from "./Icon.vue";

const props = defineProps<{ player: TpPlayer; time: TpTime }>();
const data = useRpgTpData();

const badgeTeam = computed<TpTeam | undefined>(() =>
  findTeam(data.value, props.time.teamId ?? props.player.teamId),
);
</script>
