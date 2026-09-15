<template>
  <div class="flex min-h-screen flex-col">
    <AppHeader />
    <div
      v-if="store.error"
      class="mx-auto flex max-w-6xl flex-wrap items-center justify-center gap-3 p-4 text-center text-theme-6"
    >
      <span>{{ t("errors.fetchFailed") }}</span>
      <button
        type="button"
        class="rounded-full border-2 border-theme-5 px-3 py-1 text-sm hover:bg-theme-8"
        @click="store.retry()"
      >
        {{ t("errors.retry") }}
      </button>
    </div>
    <main class="flex-1">
      <router-view />
    </main>
    <AppFooter />
  </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useSheetStore } from "./stores/sheet";
import { t } from "./i18n";
import AppHeader from "./components/AppHeader.vue";
import AppFooter from "./components/AppFooter.vue";

const store = useSheetStore();
onMounted(() => {
  void store.init();
});
</script>
