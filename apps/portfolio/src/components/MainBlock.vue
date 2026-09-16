<template>
  <section class="flex flex-col gap-4 border-b border-theme-6/40 py-12 last:border-b-0 sm:flex-row">
    <div
      class="h-[72px] w-[72px] shrink-0 self-center bg-contain bg-center bg-no-repeat"
      style="background-image: url(/logo_animated.gif)"
    />
    <div>
      <h1 class="mt-0 mb-1 text-3xl font-bold">
        {{ t("main.title") }} <span class="text-theme-6">Bastien Champin</span>
      </h1>
      <h2 class="mt-0 mb-1 text-lg text-theme-4">{{ t("main.subtitle") }}</h2>
      <p class="text-sm italic">{{ t("main.caption") }}</p>
    </div>
  </section>
</template>

<script setup lang="ts">
import { t } from "../i18n";
</script>
