<template>
  <div class="fixed h-[calc(100%-3rem)] w-[105px] shrink-0 rounded-2xl bg-rpgtp-sidebar">
    <div class="flex h-full flex-col items-center justify-between py-12">
      <SidebarLogo />
      <div class="flex h-1/3 flex-col justify-between">
        <SidebarNav />
      </div>
      <div class="flex h-[10%] flex-col justify-between">
        <SettingsToggle />
      </div>
    </div>
  </div>
  <!-- ghost div to compensate the fixed sidebar in the relative flow -->
  <div class="h-full w-[105px] shrink-0" />
</template>

<script setup lang="ts">
import SidebarLogo from "./SidebarLogo.vue";
import SidebarNav from "./SidebarNav.vue";
import SettingsToggle from "./SettingsToggle.vue";
</script>
