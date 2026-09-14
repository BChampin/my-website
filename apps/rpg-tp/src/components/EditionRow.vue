<template>
  <div
    class="relative flex flex-nowrap items-center justify-between gap-2 rounded-2xl bg-theme-2 text-theme-3 odd:flex-row-reverse md:justify-normal"
  >
    <div class="hidden h-full w-1/3 sm:flex">
      <img :src="thumbnail" alt="Card" class="h-full w-full rounded-2xl object-cover" />
    </div>

    <div v-if="data" class="w-full rounded-2xl p-4 text-left sm:w-2/3">
      <div class="flex items-center gap-4">
        <div
          class="hidden h-14 w-14 items-center justify-center rounded-full bg-theme-6 p-3 text-2xl text-theme-7 sm:flex"
        >
          #{{ edition.id }}
        </div>
        <div class="h-full w-1/3 sm:hidden">
          <img :src="thumbnail" alt="Card" class="h-full w-full rounded-2xl object-cover" />
        </div>
        <div class="flex items-center gap-2 text-xl font-bold">
          <div
            class="flex h-10 w-10 items-center justify-center rounded-full bg-theme-6 p-2 text-lg text-theme-7 sm:hidden"
          >
            #{{ edition.id }}
          </div>
          <div class="text-xl sm:text-3xl">{{ mapNames }}</div>
        </div>
      </div>
      <Divider />

      <div class="flex flex-wrap">
        <button
          v-for="(tab, i) of tabs"
          :key="tab.key"
          type="button"
          class="m-2 cursor-pointer rounded-2xl px-2 py-1"
          :class="
            i === activeTab ? 'bg-theme-6 font-semibold text-theme-7' : 'bg-theme-8 text-theme-4'
          "
          @click="activeTab = i"
        >
          <div class="flex items-center">
            <span>{{ tab.label }}</span>
            <Icon v-if="tab.icon" :name="tab.icon" class="ml-1 h-5 w-5" />
          </div>
        </button>
      </div>

      <div class="mt-2">
        <div v-if="activeTabKey === 'infos'">
          <div>
            <span class="text-lg font-bold">Date : </span><span>{{ formattedDate }}</span>
          </div>
          <div class="text-lg font-bold">Carte{{ editionMaps.length > 1 ? "s" : "" }} :</div>
          <ul>
            <MapInfo v-for="map of editionMaps" :key="map.id" :map="map" />
          </ul>
          <div class="text-lg font-bold">
            Gagnants :
            <TeamBadge :team="winnerTeam" />
          </div>
        </div>

        <div v-else-if="activeTabKey === 'participants'">
          <div v-for="(group, index) of participantsByMap" :key="group.map.id" class="mt-2">
            <Divider v-if="index > 0" />
            <MapInfo :map="group.map" />
            <div class="grid grid-cols-1 sm:grid-cols-2">
              <PlayerBadge
                v-for="entry of group.entries"
                :key="`${entry.time.mapId}_${entry.time.playerId}`"
                :player="entry.player"
                :time="entry.time"
              />
            </div>
          </div>
        </div>

        <div v-else-if="activeTabKey === 'trailer'">
          <video class="aspect-video rounded-2xl" autoplay controls>
            <source :src="publicUrl(`trailers/trailer_${edition.id}.mp4`)" type="video/mp4" />
          </video>
        </div>

        <div v-else-if="activeTabKey === 'annonce'">
          <img
            :src="publicUrl(`announcements/announcement_${edition.id}.jpg`)"
            :alt="`${edition.id} picture`"
            class="rounded-2xl"
          />
        </div>

        <div v-else-if="activeTabKey === 'recap'">
          <iframe
            v-for="(video, i) of edition.recapVideos"
            :key="i"
            width="100%"
            :src="`https://www.youtube.com/embed/${video.split('=')[1]}`"
            title="YouTube video player"
            frameborder="0"
            allow="
              accelerometer;
              autoplay;
              clipboard-write;
              encrypted-media;
              gyroscope;
              picture-in-picture;
              web-share;
            "
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen
            class="my-2 aspect-video rounded-2xl"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import type { TpEdition, TpTeam, TpTime } from "../types";
import { findPlayer, findTeam, useRpgTpData } from "../data";
import { publicUrl } from "../publicUrl";
import Divider from "./Divider.vue";
import MapInfo from "./MapInfo.vue";
import TeamBadge from "./TeamBadge.vue";
import PlayerBadge from "./PlayerBadge.vue";
import Icon from "./Icon.vue";

const props = defineProps<{ edition: TpEdition }>();
const data = useRpgTpData();

const editionMaps = computed(
  () =>
    data.value?.maps
      .filter((m) => props.edition.mapsIds.includes(m.id))
      .sort((a, b) => props.edition.mapsIds.indexOf(a.id) - props.edition.mapsIds.indexOf(b.id)) ??
    [],
);

function toSeconds(t: string): number {
  return t
    .split(":")
    .reverse()
    .reduce((s, v, i) => s + Number(v) * 60 ** i, 0);
}

const editionTimes = computed<TpTime[]>(
  () =>
    data.value?.times
      .filter((t) => props.edition.mapsIds.includes(t.mapId) && t.editionId === props.edition.id)
      .sort((a, b) => toSeconds(a.time) - toSeconds(b.time)) ?? [],
);

const winnerTeam = computed<TpTeam | undefined>(() =>
  findTeam(data.value, props.edition.winnerTeamId),
);

const mapNames = computed(() => editionMaps.value.map((m) => m.name).join(" / "));

const participantsByMap = computed(() =>
  editionMaps.value.map((map) => ({
    map,
    entries: editionTimes.value
      .filter((t) => t.mapId === map.id)
      .map((time) => ({ time, player: findPlayer(data.value, time.playerId)! })),
  })),
);

const thumbnail = computed(
  () => `https://trackmania.exchange/mapimage/${editionMaps.value[0]?.exchangeId}`,
);

const formattedDate = computed(() => props.edition.date.split("/").reverse().join("/"));

const tabs = computed(() =>
  (
    [
      { key: "infos" as const, show: props.edition.mapsIds.length > 0, label: "Infos" },
      { key: "participants" as const, show: editionTimes.value.length > 0, label: "Participants" },
      {
        key: "trailer" as const,
        show: !!props.edition.announcementTrailer,
        label: "Trailer",
        icon: "video" as const,
      },
      { key: "annonce" as const, show: !!props.edition.announcementPicture, label: "Annonce" },
      {
        key: "recap" as const,
        show: (props.edition.recapVideos?.length ?? 0) > 0,
        label: "Récap",
        icon: "video" as const,
      },
    ] as const
  ).filter((tab) => tab.show),
);

const activeTab = ref(0);
const activeTabKey = computed(() => tabs.value[activeTab.value]?.key);
</script>
