<template>
  <router-link :to="Paths.HOME" class="fixed left-1/2 -translate-x-1/2 sm:static sm:self-center">
    <img :src="publicUrl('logo.png')" alt="RPG TP" />
  </router-link>
</template>

<script setup lang="ts">
import { Paths } from "../router";
import { publicUrl } from "../publicUrl";
</script>
