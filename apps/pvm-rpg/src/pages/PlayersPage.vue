<template>
  <div class="mx-auto max-w-6xl p-4">
    <div class="flex flex-wrap items-center justify-between gap-4 py-4">
      <div class="text-3xl font-bold text-theme-6">{{ t("nav.players") }}</div>
      <div>Total : {{ store.players.length }} {{ t("nav.players") }}</div>
      <div class="flex flex-wrap items-center gap-3">
        <SearchInput v-model="filter" :placeholder="t('nav.searchBy')" />
        <select
          v-model="categoryFilter"
          class="rounded-full border-2 border-theme-5 bg-theme-2 px-3 py-1.5 text-sm outline-none focus:border-theme-6"
        >
          <option v-for="opt of categoryOptions" :key="opt.value" :value="opt.value">
            {{ opt.label }}
          </option>
        </select>
        <select
          v-model="sortMethod"
          class="rounded-full border-2 border-theme-5 bg-theme-2 px-3 py-1.5 text-sm outline-none focus:border-theme-6"
        >
          <option v-for="opt of sortOptions" :key="opt.value" :value="opt.value">
            {{ opt.label }}
          </option>
        </select>
      </div>
    </div>

    <LoadingSpinner v-if="store.loading.players" />

    <div v-else class="overflow-x-auto rounded-2xl border-2 border-theme-5">
      <table class="w-full text-left text-sm">
        <thead class="bg-theme-8">
          <tr>
            <th class="p-3">{{ t("players.name") }}</th>
            <th class="p-3">{{ t("nav.category") }}</th>
            <th class="p-3">Fame</th>
            <th class="p-3 text-right">{{ t("players.times") }}</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="player of filteredAndSortedPlayers"
            :key="player.id"
            class="cursor-pointer border-t border-theme-5 hover:bg-theme-8"
            @click="shownPlayer = player"
          >
            <td class="p-3 font-bold">{{ player.name }}</td>
            <td class="p-3">{{ player.category }}</td>
            <td class="p-3"><ColorChip :color="bestFame(player)" /></td>
            <td class="p-3 text-right">{{ player.nbRecords }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <PlayerDialog v-if="shownPlayer" :player="shownPlayer" @close="shownPlayer = null" />
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { useSheetStore } from "../stores/sheet";
import { t } from "../i18n";
import type { Fame, Player } from "../types";
import ColorChip from "../components/ColorChip.vue";
import PlayerDialog from "../components/PlayerDialog.vue";
import LoadingSpinner from "../components/LoadingSpinner.vue";
import SearchInput from "../components/SearchInput.vue";

const store = useSheetStore();

const filter = ref("");
const categoryFilter = ref<"all" | Player["category"]>("all");

const categoryOptions = computed(() => [
  { label: `All - ${store.players.length}`, value: "all" as const },
  {
    label: `Alien - ${store.players.filter((p) => p.category === "Alien").length}`,
    value: "Alien" as const,
  },
  {
    label: `Player - ${store.players.filter((p) => p.category === "Player").length}`,
    value: "Player" as const,
  },
  {
    label: `Novice - ${store.players.filter((p) => p.category === "Novice").length}`,
    value: "Novice" as const,
  },
]);

function bestFame(player: Player): Fame | undefined {
  return [player.fames.alien, player.fames.player, player.fames.intermediate, player.fames.noob]
    .filter((f): f is Fame => !!f)
    .sort((a, b) => b.level - a.level)[0];
}

type SortMethod =
  | "fame.descending"
  | "fame.ascending"
  | "records.descending"
  | "records.ascending"
  | "alphabetical.ascending"
  | "alphabetical.descending";
const sortMethod = ref<SortMethod>("fame.descending");

const sortOptions = computed(() => [
  { label: t("players.sort.fame.desc"), value: "fame.descending" },
  { label: t("players.sort.fame.asc"), value: "fame.ascending" },
  { label: t("players.sort.records.desc"), value: "records.descending" },
  { label: t("players.sort.records.asc"), value: "records.ascending" },
  { label: t("players.sort.alphabetical.asc"), value: "alphabetical.ascending" },
  { label: t("players.sort.alphabetical.desc"), value: "alphabetical.descending" },
]);

const filteredAndSortedPlayers = computed(() => {
  const needle = filter.value.trim().toLowerCase();
  const filtered = store.players.filter((p) => {
    if (categoryFilter.value !== "all" && p.category !== categoryFilter.value) return false;
    if (needle && !p.name.toLowerCase().includes(needle)) return false;
    return true;
  });

  switch (sortMethod.value) {
    case "fame.descending":
      return filtered.sort((a, b) => (bestFame(b)?.level ?? -1) - (bestFame(a)?.level ?? -1));
    case "fame.ascending":
      return filtered.sort((a, b) => (bestFame(a)?.level ?? -1) - (bestFame(b)?.level ?? -1));
    case "records.descending":
      return filtered.sort((a, b) => b.nbRecords - a.nbRecords);
    case "records.ascending":
      return filtered.sort((a, b) => a.nbRecords - b.nbRecords);
    case "alphabetical.ascending":
      return filtered.sort((a, b) => a.name.localeCompare(b.name));
    case "alphabetical.descending":
      return filtered.sort((a, b) => b.name.localeCompare(a.name));
  }
  return filtered;
});

const shownPlayer = ref<Player | null>(null);
</script>
