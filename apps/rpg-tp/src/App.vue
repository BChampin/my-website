<template>
  <div
    class="flex h-full min-h-screen w-full flex-col gap-4 bg-theme-1 pb-24 sm:flex-row sm:px-8 sm:py-6"
  >
    <Sidebar />
    <div class="flex grow flex-col gap-6 px-4 sm:pr-0">
      <router-view />
    </div>
  </div>
</template>

<script setup lang="ts">
import Sidebar from "./components/Sidebar.vue";
</script>
