<template>
  <div class="flex min-h-screen flex-col">
    <AppHeader />
    <main class="flex-1">
      <router-view />
    </main>
    <AppFooter />
  </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useSheetStore } from "./stores/sheet";
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";

const store = useSheetStore();
onMounted(() => {
  void store.init();
});
</script>
