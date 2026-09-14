<template>
  <li class="flex gap-1">
    <a
      :href="`https://trackmania.exchange/mapshow/${map.exchangeId}`"
      target="_blank"
      rel="noopener noreferrer"
      class="link"
    >
      {{ map.name }}
    </a>
    <span>par {{ map.author }}</span>
    <span>-</span>
    <span>{{ map.authorTime }}</span>
    <span>-</span>
    <span>Difficulté : {{ map.difficulty }}</span>
  </li>
</template>

<script setup lang="ts">
import type { TmMap } from "../types";

defineProps<{ map: TmMap }>();
</script>
