<template>
  <!-- ghost div to compensate the top fixed bar in the static (default) flow -->
  <div class="h-16 w-full shrink-0" />

  <div
    class="fixed top-0 z-10 flex h-16 w-full shrink-0 flex-row items-center justify-between bg-rpgtp-sidebar px-4"
  >
    <button type="button" class="text-rpgtp-sidebar-text" @click="open = !open">
      <Icon :name="open ? 'close' : 'menu'" class="h-8 w-8" />
    </button>
    <SidebarLogo />
  </div>

  <div
    class="transitionChildren fixed top-16 z-20 flex w-full flex-col items-stretch justify-between overflow-hidden bg-rpgtp-sidebar p-6"
    :class="open ? 'h-[calc(100vh-4rem)] opacity-100' : 'h-0 p-0 opacity-0'"
  >
    <div class="flex flex-col gap-8">
      <SidebarNav row labels @navigate="open = false" />
    </div>
    <div class="flex flex-col gap-8">
      <SettingsToggle labels />
    </div>
  </div>

  <div
    class="fixed bottom-0 z-10 flex h-20 w-full flex-row items-center justify-evenly rounded-t-lg bg-rpgtp-sidebar"
  >
    <SidebarNav labels />
  </div>
</template>

<script setup lang="ts">
import { onMounted, onUnmounted, ref } from "vue";
import SidebarLogo from "./SidebarLogo.vue";
import SidebarNav from "./SidebarNav.vue";
import SettingsToggle from "./SettingsToggle.vue";
import Icon from "./Icon.vue";

const open = ref(false);

function closeOnResize() {
  open.value = false;
}
onMounted(() => window.addEventListener("resize", closeOnResize));
onUnmounted(() => window.removeEventListener("resize", closeOnResize));
</script>
