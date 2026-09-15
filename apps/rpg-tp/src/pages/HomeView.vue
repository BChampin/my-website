<template>
  <div>
    <h1 class="text-no-wrap my-12 text-center text-7xl font-black text-theme-3">RPG TeamPlay</h1>
    <Title content="Le concept" />
    <Divider />
    <div class="mb-12 text-2xl font-bold text-theme-6">
      Des streamers viennent découvrir, en duo, une map Trackmania de type RPG créée pour
      l'occasion. Pas d'enjeu compétitif, juste du plaisir entre potes et du roulage !
    </div>
    <Title content="Les éditions" />
    <Divider />
    <input
      v-model="filter"
      type="text"
      placeholder="Chercher par carte, équipe ou numéro d'édition..."
      class="ui-surface mb-6 w-full max-w-md px-4 py-2 text-theme-3 outline-none placeholder:text-theme-4"
    />
    <div class="flex flex-col gap-10">
      <EditionRow v-for="edition of filteredEditions" :key="edition.id" :edition="edition" />
      <div v-if="!filteredEditions.length" class="text-theme-4">Aucune édition ne correspond.</div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import { useRpgTpData } from "../data";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import EditionRow from "../components/EditionRow.vue";

const data = useRpgTpData();
const reversedEditions = computed(() => [...(data.value?.editions ?? [])].reverse());

const filter = ref("");
const filteredEditions = computed(() => {
  const needle = filter.value.trim().toLowerCase();
  if (!needle) return reversedEditions.value;
  return reversedEditions.value.filter((edition) => {
    if (edition.id.toLowerCase().includes(needle)) return true;
    const winner = data.value?.teams.find((t) => t.id === edition.winnerTeamId);
    if (
      winner &&
      (winner.name.toLowerCase().includes(needle) || winner.id.toLowerCase().includes(needle))
    )
      return true;
    const mapNames = data.value?.maps.filter((m) => edition.mapsIds.includes(m.id)) ?? [];
    return mapNames.some((m) => m.name.toLowerCase().includes(needle));
  });
});
</script>
