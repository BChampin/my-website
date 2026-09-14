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
    <div class="flex flex-col gap-10">
      <EditionRow v-for="edition of reversedEditions" :key="edition.id" :edition="edition" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import { useRpgTpData } from "../data";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import EditionRow from "../components/EditionRow.vue";

const data = useRpgTpData();
const reversedEditions = computed(() => [...(data.value?.editions ?? [])].reverse());
</script>
