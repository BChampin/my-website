<template>
  <div>
    <router-link :to="Paths.HOME" class="text-sm text-theme-4 hover:opacity-80">
      ← Retour à l'accueil
    </router-link>

    <div v-if="!team" class="mt-6 text-theme-4">Équipe introuvable.</div>

    <template v-else>
      <div class="mt-4 flex flex-wrap items-center gap-3 rounded-lg bg-theme-2 p-5 shadow">
        <span class="text-4xl">{{ team.emoji }}</span>
        <h1 class="text-3xl font-bold text-theme-3">{{ team.name }}</h1>
        <span
          class="rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset"
          :style="{
            backgroundColor: colors.bg,
            color: colors.text,
            '--tw-ring-color': colors.ring,
          }"
        >
          {{ team.id }}
        </span>
      </div>

      <Title :content="`Éditions remportées (${wonEditions.length})`" />
      <Divider />
      <div v-if="wonEditions.length" class="flex flex-wrap gap-2">
        <div
          v-for="edition of wonEditions"
          :key="edition.id"
          class="rounded-full bg-theme-2 px-3 py-1 text-sm font-medium"
        >
          #{{ edition.id }}
        </div>
      </div>
      <div v-else class="text-theme-4">Aucune édition remportée pour le moment.</div>

      <Title :content="`Roster actuel (${roster.length})`" />
      <Divider />
      <div v-if="roster.length" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <PlayerCard v-for="player of roster" :key="player.id" :player="player" />
      </div>
      <div v-else class="text-theme-4">Aucun joueur assigné à cette équipe actuellement.</div>

      <Title content="Historique des participations" />
      <Divider />
      <div v-if="history.length" class="flex flex-col gap-2">
        <div
          v-for="entry of history"
          :key="`${entry.time.editionId}_${entry.time.mapId}_${entry.time.playerId}`"
          class="flex flex-wrap items-center justify-between gap-2 rounded-2xl bg-theme-2 p-3"
        >
          <div class="flex flex-wrap items-center gap-3">
            <span class="font-bold">#{{ entry.time.editionId }}</span>
            <span>{{ entry.map?.name ?? entry.time.mapId }}</span>
            <span>{{ entry.player?.name ?? entry.time.playerId }}</span>
          </div>
          <span class="text-theme-4">{{ entry.time.time }}</span>
        </div>
      </div>
      <div v-else class="text-theme-4">Aucune participation enregistrée pour cette équipe.</div>
    </template>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useRoute } from "vue-router";
import { TEAM_COLOR_PALETTE } from "../types";
import { findPlayer, useRpgTpData } from "../data";
import { Paths } from "../router";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import PlayerCard from "../components/PlayerCard.vue";

const route = useRoute();
const data = useRpgTpData();

const team = computed(() => data.value?.teams.find((t) => t.id === route.params.id));
const colors = computed(() =>
  team.value ? TEAM_COLOR_PALETTE[team.value.color] : TEAM_COLOR_PALETTE.rose,
);

const wonEditions = computed(
  () => data.value?.editions.filter((e) => e.winnerTeamId === team.value?.id) ?? [],
);

const roster = computed(() => data.value?.players.filter((p) => p.teamId === team.value?.id) ?? []);

const history = computed(() => {
  const currentTeam = team.value;
  if (!currentTeam) return [];
  return (data.value?.times ?? [])
    .filter((time) => time.teamId === currentTeam.id)
    .map((time) => ({
      time,
      map: data.value?.maps.find((m) => m.id === time.mapId),
      player: findPlayer(data.value, time.playerId),
    }))
    .sort((a, b) => Number(a.time.editionId) - Number(b.time.editionId));
});
</script>
