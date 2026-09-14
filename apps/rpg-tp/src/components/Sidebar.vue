<template>
  <div class="sm:hidden">
    <MicroSidebar />
  </div>
  <div class="hidden sm:block">
    <FullSidebar />
  </div>
</template>

<script setup lang="ts">
import MicroSidebar from "./MicroSidebar.vue";
import FullSidebar from "./FullSidebar.vue";
</script>
