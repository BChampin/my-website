<template>
  <div class="mx-auto max-w-6xl p-4">
    <div class="flex flex-wrap items-center justify-between gap-4 py-4">
      <div class="text-3xl font-bold text-theme-6">{{ t("nav.maps") }}</div>
      <div>Total : {{ store.maps.length }} {{ t("nav.maps") }}</div>
      <div class="flex flex-wrap items-center gap-3">
        <SearchInput v-model="filter" :placeholder="t('nav.searchBy')" />
        <select
          v-model="sortMethod"
          class="rounded-full border-2 border-theme-5 bg-theme-2 px-3 py-1.5 text-sm outline-none focus:border-theme-6"
        >
          <option v-for="opt of sortOptions" :key="opt.value" :value="opt.value">
            {{ opt.label }}
          </option>
        </select>
        <button
          type="button"
          class="flex h-9 w-9 items-center justify-center rounded-full border-2 border-theme-5 hover:bg-theme-8"
          :title="gridView ? 'List view' : 'Grid view'"
          @click="gridView = !gridView"
        >
          <Icon :name="gridView ? 'list' : 'grid'" class="h-5 w-5" />
        </button>
      </div>
    </div>

    <LoadingSpinner v-if="store.loading.maps" />

    <div v-else-if="gridView" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <MapCard v-for="map of filteredMaps" :key="map.label" :map="map" />
    </div>

    <div v-else class="overflow-x-auto rounded-2xl border-2 border-theme-5">
      <table class="w-full text-left text-sm">
        <thead class="bg-theme-8">
          <tr>
            <th class="p-3">Map</th>
            <th class="p-3">Grade</th>
            <th class="p-3">Alien</th>
            <th class="p-3">Player</th>
            <th class="p-3">Intermediate</th>
            <th class="p-3">Noob</th>
            <th class="p-3">Author</th>
            <th class="p-3 text-right">Link</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="map of filteredMaps" :key="map.label" class="border-t border-theme-5">
            <td class="p-3 font-bold">{{ map.label }}</td>
            <td class="p-3"><ColorChip :color="map.grade" /></td>
            <td class="p-3">{{ timeNumberToStr(map.times.alien) }}</td>
            <td class="p-3">{{ timeNumberToStr(map.times.player) }}</td>
            <td class="p-3">{{ timeNumberToStr(map.times.intermediate) }}</td>
            <td class="p-3">{{ timeNumberToStr(map.times.noob) }}</td>
            <td class="p-3">{{ map.exchange.author?.name ?? "Author not found" }}</td>
            <td class="p-3 text-right">
              <a
                v-if="map.exchange.link"
                :href="map.exchange.link"
                target="_blank"
                rel="noopener"
                class="link inline-flex items-center gap-1"
              >
                <Icon name="link" class="h-4 w-4" />
                TMX
              </a>
              <span v-else>Link not found :/</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { useSheetStore } from "../stores/sheet";
import { timeNumberToStr } from "../utils";
import { t } from "../i18n";
import ColorChip from "../components/ColorChip.vue";
import MapCard from "../components/MapCard.vue";
import Icon from "../components/Icon.vue";
import LoadingSpinner from "../components/LoadingSpinner.vue";
import SearchInput from "../components/SearchInput.vue";

const store = useSheetStore();

const filter = ref("");
const gridView = ref(true);

type SortMethod =
  | "grade.ascending"
  | "grade.descending"
  | "alphabetical.ascending"
  | "alphabetical.descending"
  | "duration.ascending"
  | "duration.descending";
const sortMethod = ref<SortMethod>("grade.ascending");

const sortOptions = computed(() => [
  { label: t("maps.sort.grade.asc"), value: "grade.ascending" },
  { label: t("maps.sort.grade.desc"), value: "grade.descending" },
  { label: t("maps.sort.alphabetical.asc"), value: "alphabetical.ascending" },
  { label: t("maps.sort.alphabetical.desc"), value: "alphabetical.descending" },
  { label: t("maps.sort.duration.asc"), value: "duration.ascending" },
  { label: t("maps.sort.duration.desc"), value: "duration.descending" },
]);

const sortedMaps = computed(() => {
  const copyFrom = [...store.maps];
  switch (sortMethod.value) {
    case "grade.ascending":
      return copyFrom.sort((a, b) => a.grade.level - b.grade.level);
    case "grade.descending":
      return copyFrom.sort((a, b) => b.grade.level - a.grade.level);
    case "alphabetical.ascending":
      return copyFrom.sort((a, b) => a.label.localeCompare(b.label));
    case "alphabetical.descending":
      return copyFrom.sort((a, b) => b.label.localeCompare(a.label));
    case "duration.ascending":
      return copyFrom.sort((a, b) => a.times.alien - b.times.alien);
    case "duration.descending":
      return copyFrom.sort((a, b) => b.times.alien - a.times.alien);
  }
  return copyFrom;
});

const filteredMaps = computed(() => {
  const needle = filter.value.trim().toLowerCase();
  if (!needle) return sortedMaps.value;
  return sortedMaps.value.filter(
    (map) =>
      map.label.toLowerCase().includes(needle) ||
      map.exchange.author?.name?.toLowerCase().includes(needle),
  );
});
</script>
