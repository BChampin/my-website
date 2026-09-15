<template>
  <div>
    <Title content="Statistiques" />
    <Divider />

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
      <div>
        <h2 class="mb-2 text-lg font-bold text-theme-3">Équipes les plus victorieuses</h2>
        <div class="flex flex-col gap-2">
          <div
            v-for="entry of teamWins"
            :key="entry.team.id"
            class="flex items-center justify-between rounded-2xl bg-theme-2 p-3"
          >
            <TeamBadge :team="entry.team" />
            <span class="font-bold">{{ entry.wins }} victoire{{ entry.wins > 1 ? "s" : "" }}</span>
          </div>
          <div v-if="!teamWins.length" class="text-theme-4">Pas encore de données.</div>
        </div>
      </div>

      <div>
        <h2 class="mb-2 text-lg font-bold text-theme-3">Joueurs les plus actifs</h2>
        <div class="flex flex-col gap-2">
          <div
            v-for="entry of activePlayers"
            :key="entry.player.id"
            class="flex items-center justify-between rounded-2xl bg-theme-2 p-3"
          >
            <router-link :to="playerPath(entry.player.id)" class="font-medium hover:opacity-80">
              {{ entry.player.name }}
            </router-link>
            <span class="font-bold">
              {{ entry.editions }} édition{{ entry.editions > 1 ? "s" : "" }}
            </span>
          </div>
          <div v-if="!activePlayers.length" class="text-theme-4">Pas encore de données.</div>
        </div>
      </div>

      <div>
        <h2 class="mb-2 text-lg font-bold text-theme-3">Équipes les plus actives</h2>
        <div class="flex flex-col gap-2">
          <div
            v-for="entry of activeTeams"
            :key="entry.team.id"
            class="flex items-center justify-between rounded-2xl bg-theme-2 p-3"
          >
            <TeamBadge :team="entry.team" />
            <span class="font-bold">
              {{ entry.participations }} participation{{ entry.participations > 1 ? "s" : "" }}
            </span>
          </div>
          <div v-if="!activeTeams.length" class="text-theme-4">Pas encore de données.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useRpgTpData } from "../data";
import { playerPath } from "../router";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import TeamBadge from "../components/TeamBadge.vue";

const data = useRpgTpData();

const teamWins = computed(() => {
  const winCounts = new Map<string, number>();
  for (const edition of data.value?.editions ?? []) {
    if (!edition.winnerTeamId) continue;
    winCounts.set(edition.winnerTeamId, (winCounts.get(edition.winnerTeamId) ?? 0) + 1);
  }
  return [...winCounts.entries()]
    .map(([teamId, wins]) => ({ team: data.value?.teams.find((t) => t.id === teamId), wins }))
    .filter(
      (entry): entry is { team: NonNullable<typeof entry.team>; wins: number } => !!entry.team,
    )
    .sort((a, b) => b.wins - a.wins);
});

const activePlayers = computed(() => {
  const editionsByPlayer = new Map<string, Set<string>>();
  for (const time of data.value?.times ?? []) {
    if (!time.editionId) continue;
    const set = editionsByPlayer.get(time.playerId) ?? new Set<string>();
    set.add(time.editionId);
    editionsByPlayer.set(time.playerId, set);
  }
  return [...editionsByPlayer.entries()]
    .map(([playerId, editions]) => ({
      player: data.value?.players.find((p) => p.id === playerId),
      editions: editions.size,
    }))
    .filter(
      (entry): entry is { player: NonNullable<typeof entry.player>; editions: number } =>
        !!entry.player,
    )
    .sort((a, b) => b.editions - a.editions)
    .slice(0, 10);
});

const activeTeams = computed(() => {
  const countsByTeam = new Map<string, number>();
  for (const time of data.value?.times ?? []) {
    if (!time.teamId) continue;
    countsByTeam.set(time.teamId, (countsByTeam.get(time.teamId) ?? 0) + 1);
  }
  return [...countsByTeam.entries()]
    .map(([teamId, participations]) => ({
      team: data.value?.teams.find((t) => t.id === teamId),
      participations,
    }))
    .filter(
      (entry): entry is { team: NonNullable<typeof entry.team>; participations: number } =>
        !!entry.team,
    )
    .sort((a, b) => b.participations - a.participations)
    .slice(0, 10);
});
</script>
