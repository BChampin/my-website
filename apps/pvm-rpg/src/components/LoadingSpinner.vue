<template>
  <div class="flex items-center justify-center p-4">
    <img :src="publicUrl('images/logo_tm_round.png')" class="spinner h-12 w-12" alt="" />
  </div>
</template>

<script setup lang="ts">
import { publicUrl } from "../publicUrl";
</script>

<style scoped>
@keyframes rotate-and-scale {
  0%,
  100% {
    opacity: 0.8;
  }
  25%,
  75% {
    opacity: 1;
  }
  0%,
  15% {
    transform: scale(1);
  }
  25%,
  35% {
    transform: scale(0.9);
  }
  65%,
  75% {
    transform: scale(0.9) rotate(360deg);
  }
  85%,
  100% {
    transform: scale(1) rotate(360deg);
  }
}
.spinner {
  animation: rotate-and-scale 2.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}
</style>
