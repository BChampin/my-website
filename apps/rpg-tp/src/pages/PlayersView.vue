<template>
  <div>
    <Title content="Les légendes du TeamPlay" />
    <Divider />
    <div v-if="data" class="mb-6 grid gap-8 lg:mb-16 lg:grid-cols-2">
      <PlayerCard v-for="player of data.players" :key="player.id" :player="player" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { useRpgTpData } from "../data";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import PlayerCard from "../components/PlayerCard.vue";

const data = useRpgTpData();
</script>
