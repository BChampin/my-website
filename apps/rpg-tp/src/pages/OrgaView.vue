<template>
  <div>
    <Title content="Ils ont rendu le RPG TP possible" />
    <Divider />

    <div class="text-center">Envoyez leur du love et awardez les maps</div>
    <div class="my-10 flex flex-wrap justify-center gap-4">
      <img
        :src="publicUrl('wingoLove.gif')"
        style="height: 100%; max-height: 100px; width: auto; aspect-ratio: initial"
      />
    </div>

    <div class="flex flex-wrap justify-center gap-4">
      <div
        v-for="(orga, i) of data?.org ?? []"
        :key="i"
        class="flex w-64 flex-col items-center rounded-2xl bg-theme-2 p-6 shadow-lg"
      >
        <div class="text-xl font-semibold text-theme-3">{{ orga.name }}</div>
        <div class="text-md mt-1 text-theme-4">{{ orga.roles }}</div>
        <a
          v-if="orga.exchange"
          :href="orga.exchange"
          target="_blank"
          rel="noopener noreferrer"
          class="mt-4 rounded-lg bg-theme-5 px-4 py-2 text-sm text-theme-3 transition hover:bg-theme-6 hover:text-theme-7"
        >
          Voir les cartes
        </a>
      </div>
    </div>

    <Divider />

    <footer
      class="flex flex-col items-center justify-center gap-4 p-2 text-center text-theme-3 sm:flex-row sm:items-baseline"
    >
      <div>Made with ❤️ and ☕ by Sakastien</div>
      <div class="text-lg">·</div>
      <div>
        Project base and Sidebar by
        <a target="_blank" rel="noopener noreferrer" class="link" href="https://github.com/xAt0mZ"
          >xAt0mZ</a
        >
      </div>
      <div class="text-lg">·</div>
      <div>
        <a target="_blank" rel="noopener noreferrer" href="https://github.com/BChampin/rpg-tp">
          <FaIcon :icon="faGithub" class="h-4 w-4" />
        </a>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { faGithub } from "@fortawesome/free-brands-svg-icons";
import { useRpgTpData } from "../data";
import { publicUrl } from "../publicUrl";
import Title from "../components/Title.vue";
import Divider from "../components/Divider.vue";
import FaIcon from "../components/FaIcon.vue";

const data = useRpgTpData();
</script>
