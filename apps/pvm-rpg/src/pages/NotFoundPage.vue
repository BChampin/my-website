<template>
  <div
    class="flex min-h-[70vh] flex-col items-center justify-center gap-4 bg-theme-6 p-8 text-center text-theme-7"
  >
    <div class="text-[20vh] leading-none font-bold">404</div>
    <div class="text-3xl opacity-80">Oops. Nothing here...</div>
    <router-link
      :to="{ name: 'home' }"
      class="mt-4 rounded-[25px] border-2 border-theme-7 px-4 py-2 font-semibold hover:bg-theme-7 hover:text-theme-6"
    >
      Go Home
    </router-link>
  </div>
</template>

<script setup lang="ts"></script>
