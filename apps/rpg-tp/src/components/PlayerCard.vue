<template>
  <div class="items-center rounded-lg bg-theme-2 shadow sm:flex">
    <img
      class="w-full rounded-lg object-cover sm:rounded-none sm:rounded-l-lg"
      :src="publicUrl(`players/player_${player.id}.png`)"
      :alt="`${player.name} picture`"
      style="height: 100%; max-height: 200px; width: auto; aspect-ratio: initial"
    />
    <div class="p-5">
      <div class="row row-nowrap w-full justify-between">
        <h3 class="text-xl font-bold tracking-tight text-theme-3">
          <a :href="player.twitch" target="_blank" rel="noopener noreferrer">{{ player.name }}</a>
        </h3>
        <TeamBadge :team="team" />
      </div>
      <p class="mt-3 mb-4 font-light text-theme-4">{{ player.quote }}</p>
      <ul class="flex space-x-4 sm:mt-0">
        <li v-for="social of socials" :key="social.key">
          <a
            :href="social.href"
            target="_blank"
            rel="noopener noreferrer"
            class="text-theme-4 hover:text-theme-3"
          >
            <FaIcon :icon="social.icon" class="h-4 w-4" />
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import {
  faBluesky,
  faDiscord,
  faInstagram,
  faTiktok,
  faTwitch,
  faTwitter,
  faYoutube,
} from "@fortawesome/free-brands-svg-icons";
import type { TpPlayer, TpTeam } from "../types";
import { useRpgTpData } from "../data";
import { publicUrl } from "../publicUrl";
import TeamBadge from "./TeamBadge.vue";
import FaIcon from "./FaIcon.vue";

const props = defineProps<{ player: TpPlayer }>();
const data = useRpgTpData();

const team = computed<TpTeam | undefined>(() =>
  data.value?.teams.find((t) => t.id === props.player.teamId),
);

const socials = computed(() =>
  (
    [
      { key: "twitch", icon: faTwitch },
      { key: "twitter", icon: faTwitter },
      { key: "discord", icon: faDiscord },
      { key: "youtube", icon: faYoutube },
      { key: "bluesky", icon: faBluesky },
      { key: "instagram", icon: faInstagram },
      { key: "tiktok", icon: faTiktok },
    ] as const
  )
    .map((s) => ({ ...s, href: props.player[s.key] }))
    .filter((s): s is typeof s & { href: string } => !!s.href),
);
</script>
