<template>
  <Card class="flex-none">
    <div class="grid grid-cols-4 items-center gap-4">
      <div
        class="col-span-4 h-[50px] bg-contain bg-center bg-no-repeat sm:col-span-1"
        style="background-image: url(/logo_animated.gif)"
      />
      <div class="col-span-4 sm:col-span-3">
        <h1 class="mt-0 mb-1 text-3xl font-bold">
          {{ t("main.title") }} <span class="text-theme-6">Bastien Champin</span>
        </h1>
        <h2 class="mt-0 mb-1 text-lg text-theme-4">{{ t("main.subtitle") }}</h2>
        <p class="text-sm italic">{{ t("main.caption") }}</p>
      </div>
    </div>
  </Card>
</template>

<script setup lang="ts">
import { Card } from "@my-website/ui";
import { t } from "../i18n";
</script>
