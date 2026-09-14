<template>
  <dialog ref="dialogEl" class="player-dialog" @click="onBackdropClick" @close="emit('close')">
    <div class="max-h-[85vh] w-[min(90vw,900px)] overflow-y-auto p-4">
      <div class="flex items-start justify-between gap-4">
        <div class="flex items-center gap-3">
          <div
            class="flex h-12 w-12 items-center justify-center rounded-full bg-theme-6 text-xl font-bold text-theme-7 uppercase"
          >
            {{ player.name.slice(0, 1) }}
          </div>
          <div class="text-2xl font-bold">{{ player.name }}</div>
        </div>
        <div class="flex items-center gap-3">
          <div class="text-sm font-medium whitespace-nowrap">
            {{ totalMedals }} / {{ store.maps.length * 4 }}
          </div>
          <button
            type="button"
            class="rounded-full border-2 border-theme-5 px-2 py-1 hover:bg-theme-8"
            @click="close"
          >
            <Icon name="close" class="h-4 w-4" />
          </button>
        </div>
      </div>

      <div class="my-4 border-t border-theme-5" />

      <div class="text-lg font-semibold">Overall fame</div>
      <div class="mt-2 flex flex-wrap justify-around gap-3">
        <div
          v-for="[slot, fame] of fameEntries"
          :key="slot"
          class="rounded-xl border-2 border-theme-5 bg-theme-2 p-3 text-center"
        >
          <div class="text-xs uppercase">{{ slot }}</div>
          <FameChip :fame="fame" />
          <div class="mt-2 flex items-center gap-2">
            <MedalComponent :level="getLevel(slot)" />
            <div class="text-sm font-medium whitespace-nowrap">
              {{ fame.level }} / {{ store.maps.length }}
            </div>
          </div>
        </div>
      </div>

      <div class="my-4 border-t border-theme-5" />

      <div class="text-lg font-semibold">{{ t("players.times") }}</div>
      <details v-for="cat of categorizedDoneMaps" :key="cat.grade.level" class="mt-2" open>
        <summary class="cursor-pointer font-medium">
          {{ cat.grade.label }} - {{ cat.categoryTimes.length }} / {{ cat.nbPerGrade }}
        </summary>
        <div class="mt-2 grid grid-cols-2 gap-3 sm:grid-cols-3">
          <div v-for="(obj, i) of cat.categoryTimes" :key="i">
            <div class="flex items-center gap-2 text-sm whitespace-nowrap">
              <a
                :href="obj.map.exchange.link ?? 'https://trackmania.exchange/'"
                class="link"
                target="_blank"
              >
                {{ obj.map.label }}
              </a>
              <span>-</span>
              <span>{{ timeNumberToStr(obj.playerMapTime.time) }}</span>
            </div>
            <MedalGroup :map="obj.map" :time="obj.playerMapTime.time" />
          </div>
        </div>
        <template v-if="cat.missingMaps.length">
          <div class="mt-3 text-sm font-semibold">{{ t("players.missing") }}</div>
          <div class="mt-1 grid grid-cols-2 gap-3 sm:grid-cols-3">
            <div v-for="(map, i) of cat.missingMaps" :key="i" class="text-sm">
              <a
                :href="map.exchange.link ?? 'https://trackmania.exchange/'"
                class="link"
                target="_blank"
              >
                {{ map.label }}
              </a>
            </div>
          </div>
        </template>
      </details>
    </div>
  </dialog>
</template>

<script setup lang="ts">
import { computed, onMounted, ref } from "vue";
import { useSheetStore } from "../stores/sheet";
import type { Fame, Map, MapGrade, Player, TimeRecord } from "../types";
import { getLevel } from "../types";
import MedalGroup from "./MedalGroup.vue";
import MedalComponent from "./MedalComponent.vue";
import FameChip from "./FameChip.vue";
import Icon from "./Icon.vue";
import { t } from "../i18n";
import { timeNumberToStr } from "../utils";

const store = useSheetStore();

const props = defineProps<{
  player: Player;
}>();

const emit = defineEmits<{ close: [] }>();

const dialogEl = ref<HTMLDialogElement>();

onMounted(() => dialogEl.value?.showModal());

function close() {
  dialogEl.value?.close();
}
function onBackdropClick(e: MouseEvent) {
  if (e.target === dialogEl.value) close();
}

const fameEntries = computed(() => Object.entries(props.player.fames) as [string, Fame][]);

const totalMedals = computed(() =>
  Object.values(props.player.fames).reduce((sum, fame) => sum + (fame?.level ?? 0), 0),
);

const categorizedDoneMaps = computed(() => {
  const playerTimeRecords = store.timeRecords.filter(
    (timeRecord) => timeRecord.playerId === props.player.id,
  );

  const categorizedDoneMaps: {
    grade: MapGrade;
    nbPerGrade: number;
    categoryTimes: { map: Map; playerMapTime: TimeRecord }[];
    missingMaps: Map[];
  }[] = [];

  store.maps.forEach((map) => {
    const playerMapTime = playerTimeRecords.find((ptr) => ptr.mapId === map.exchange.id);
    let gradeIndex = categorizedDoneMaps.findIndex((cdm) => cdm.grade.level === map.grade.level);

    if (gradeIndex < 0) {
      categorizedDoneMaps.push({
        grade: map.grade,
        nbPerGrade: store.maps.filter((sm) => sm.grade.level === map.grade.level).length,
        categoryTimes: [],
        missingMaps: [],
      });
    }
    gradeIndex = categorizedDoneMaps.findIndex((cdm) => cdm.grade.level === map.grade.level);

    if (playerMapTime) {
      categorizedDoneMaps[gradeIndex]?.categoryTimes?.push({ map, playerMapTime });
    } else {
      categorizedDoneMaps[gradeIndex]?.missingMaps.push(map);
    }
  });
  return categorizedDoneMaps;
});
</script>

<style scoped>
.player-dialog {
  border: none;
  border-radius: 25px;
  background-color: var(--theme-2);
  color: var(--theme-3);
  padding: 0;
}
.player-dialog::backdrop {
  background-color: rgba(0, 0, 0, 0.5);
}
</style>
