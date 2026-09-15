<template>
  <div>
    <div
      class="relative flex flex-col items-center gap-8 bg-cover bg-center px-4 pt-16 pb-12 text-center"
      :style="{
        backgroundImage: `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url(${publicUrl('images/home_bg_1.jpg')})`,
      }"
    >
      <div class="text-white">
        <div class="text-2xl font-medium">{{ t("home.welcome") }}</div>
        <h1 class="mt-1 text-5xl font-bold text-theme-7 sm:text-6xl">PVM-RPG</h1>
      </div>

      <div class="grid w-full max-w-3xl grid-cols-1 gap-4 sm:grid-cols-3">
        <div
          v-for="stat of stats"
          :key="stat.label"
          class="rounded-2xl bg-theme-6 p-6 text-theme-7"
        >
          <LoadingSpinner v-if="stat.loading" />
          <div v-else class="text-4xl font-bold">{{ stat.value }}</div>
          <div>{{ stat.label }}</div>
        </div>
      </div>
    </div>

    <div v-if="newPlayers.length" class="flex justify-center bg-theme-1 p-8">
      <div class="w-full max-w-3xl">
        <div class="flex items-center gap-3">
          <Icon name="users" class="h-6 w-6 text-theme-6" />
          <div class="text-xl font-semibold">{{ t("home.newPlayers.title") }}</div>
        </div>
        <div class="my-3 border-t border-theme-5" />
        <div class="flex flex-wrap gap-2">
          <div
            v-for="player of newPlayers"
            :key="player.id"
            class="rounded-full border-2 border-theme-5 bg-theme-2 px-3 py-1 text-sm font-medium"
          >
            {{ player.name }}
          </div>
        </div>
      </div>
    </div>

    <div class="flex justify-center bg-theme-1 p-8">
      <div class="w-full max-w-3xl">
        <div class="flex items-center gap-3">
          <Icon name="info" class="h-6 w-6 text-theme-6" />
          <div class="text-xl font-semibold">{{ t("home.intro.title") }}</div>
        </div>
        <div class="my-3 border-t border-theme-5" />
        <p class="mb-3">{{ t("home.intro.p1") }}</p>
        <p>{{ t("home.intro.p2") }}</p>
      </div>
    </div>

    <div class="flex justify-center bg-theme-6 p-8 text-theme-7">
      <div class="w-full max-w-3xl">
        <div class="flex items-center gap-3">
          <Icon name="map" class="h-6 w-6" />
          <div class="text-xl font-semibold">{{ t("home.objective.title") }}</div>
        </div>
        <div class="my-3 border-t border-theme-7/40" />
        <p class="mb-3">{{ t("home.objective.p1") }}</p>
        <p>{{ t("home.objective.p2") }}</p>
      </div>
    </div>

    <div class="flex justify-center bg-theme-1 p-8">
      <div class="w-full max-w-3xl">
        <div class="flex items-center gap-3">
          <Icon name="help" class="h-6 w-6 text-theme-6" />
          <div class="text-xl font-semibold">{{ t("home.howto.title") }}</div>
        </div>
        <div class="my-3 border-t border-theme-5" />

        <p class="mb-2 font-semibold">{{ t("home.howto.categories.title") }}</p>
        <ul class="mb-3 list-disc space-y-2 pl-5">
          <li>{{ t("home.howto.categories.p1") }}</li>
          <li>{{ t("home.howto.categories.p2") }}</li>
          <li>{{ t("home.howto.categories.p3") }}</li>
        </ul>

        <div class="my-3 border-t border-theme-5" />
        <p class="mb-2 font-semibold">{{ t("home.howto.times.title") }}</p>
        <ul class="mb-3 list-disc space-y-2 pl-5">
          <li>{{ t("home.howto.times.p1") }}</li>
          <li>{{ t("home.howto.times.p2") }}</li>
          <li>
            {{ t("home.howto.times.p3") }}<span class="font-bold">Name</span
            >{{ t("home.howto.times.p4") }}
          </li>
          <li class="whitespace-pre-line">{{ t("home.howto.times.p5") }}</li>
          <li>{{ t("home.howto.times.p6") }}</li>
          <li>{{ t("home.howto.times.p7") }}</li>
        </ul>

        <div class="my-3 border-t border-theme-5" />
        <p class="mb-2 font-semibold">{{ t("home.howto.tips.title") }}</p>
        <p>
          {{ t("home.howto.tips.p1") }}<span class="font-bold">/list</span
          >{{ t("home.howto.tips.p2") }}
        </p>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useSheetStore } from "../stores/sheet";
import { t } from "../i18n";
import { publicUrl } from "../publicUrl";
import Icon from "../components/Icon.vue";
import LoadingSpinner from "../components/LoadingSpinner.vue";

const store = useSheetStore();

const stats = computed(() => [
  { label: t("nav.maps"), value: store.maps.length, loading: store.loading.maps },
  { label: t("nav.players"), value: store.players.length, loading: store.loading.players },
  { label: t("nav.records"), value: store.timeRecords.length, loading: store.loading.timeRecords },
]);

// The sheet has no per-entry timestamp, so this approximates "recent" as the
// last rows encountered per player sheet, which in practice is where new
// signups get appended.
const newPlayers = computed(() => store.players.slice(-8).reverse());
</script>
