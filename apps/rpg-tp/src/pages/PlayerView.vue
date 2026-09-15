<template>
  <div>
    <router-link :to="Paths.PLAYERS" class="text-sm text-theme-4 hover:opacity-80">
      ← Retour aux joueurs
    </router-link>

    <div v-if="!player" class="mt-6 text-theme-4">Joueur introuvable.</div>

    <template v-else>
      <div class="mt-4 items-center rounded-lg bg-theme-2 p-5 shadow sm:flex sm:gap-5">
        <img
          class="h-32 w-32 rounded-full object-cover"
          :src="playerImageUrl(player.id)"
          :alt="`${player.name} picture`"
        />
        <div class="mt-4 sm:mt-0">
          <div class="flex flex-wrap items-center gap-3">
            <h1 class="text-3xl font-bold text-theme-3">{{ player.name }}</h1>
            <TeamBadge :team="team" />
          </div>
          <p class="mt-2 font-light text-theme-4">{{ player.quote }}</p>
          <ul class="mt-3 flex space-x-4">
            <li v-for="social of socials" :key="social.key">
              <a
                :href="social.href"
                target="_blank"
                rel="noopener noreferrer"
                class="text-theme-4 hover:text-theme-3"
              >
                <FaIcon :icon="social.icon" class="h-5 w-5" />
              </a>
            </li>
          </ul>
        </div>
      </div>

      <Title content="Historique des éditions" />
      <Divider />

      <div v-if="history.length" class="flex flex-col gap-2">
        <div
          v-for="entry of history"
          :key="`${entry.time.editionId}_${entry.time.mapId}`"
          class="flex flex-wrap items-center justify-between gap-2 rounded-2xl bg-theme-2 p-3"
        >
          <div class="flex flex-wrap items-center gap-3">
            <span class="font-bold">#{{ entry.time.editionId }}</span>
            <span>{{ entry.map?.name ?? entry.time.mapId }}</span>
            <TeamBadge :team="entry.team" />
          </div>
          <div class="flex items-center gap-3">
            <span class="text-theme-4">{{ entry.time.time }}</span>
            <a
              v-if="entry.time.replay"
              :href="entry.time.replay"
              target="_blank"
              rel="noopener noreferrer"
              class="flex items-center gap-1 text-sm text-theme-4 hover:text-theme-3"
            >
              <Icon name="video" class="h-4 w-4" />
              Replay
            </a>
          </div>
        </div>
      </div>
      <div v-else class="text-theme-4">Aucun temps enregistré.</div>
    </template>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useRoute } from "vue-router";
import type { TpTeam } from "../types";
import { findTeam, playerSocials, useRpgTpData } from "../data";
import { playerImageUrl } from "../publicUrl";
import { Paths } from "../router";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import TeamBadge from "../components/TeamBadge.vue";
import FaIcon from "../components/FaIcon.vue";
import Icon from "../components/Icon.vue";

const route = useRoute();
const data = useRpgTpData();

const player = computed(() => data.value?.players.find((p) => p.id === route.params.id));
const team = computed<TpTeam | undefined>(() => findTeam(data.value, player.value?.teamId));
const socials = computed(() => (player.value ? playerSocials(player.value) : []));

const history = computed(() => {
  const currentPlayer = player.value;
  if (!currentPlayer) return [];
  return (data.value?.times ?? [])
    .filter((time) => time.playerId === currentPlayer.id)
    .map((time) => ({
      time,
      map: data.value?.maps.find((m) => m.id === time.mapId),
      team: findTeam(data.value, time.teamId ?? currentPlayer.teamId),
    }))
    .sort((a, b) => Number(a.time.editionId) - Number(b.time.editionId));
});
</script>
