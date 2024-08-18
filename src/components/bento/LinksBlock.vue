<template>
  <div class="full-width">
    <div class="row q-col-gutter-sm">
      <div class="col-4 col-sm-2 square">
        <a :href="portfolioData.links.malt.href" target="_blank" >
          <div class="bento-block q-pa-sm fit flex flex-center">
            <img src="/logos/malt.svg" alt="Logo Malt" height="40">
          </div>
          <q-tooltip>{{ portfolioData.links.malt.label }}</q-tooltip>
        </a>
      </div>
      <div class="col-4 col-sm-2 square">
        <a :href="portfolioData.links.github.href" target="_blank" >
          <div class="bento-block q-pa-sm fit flex flex-center">
            <img src="/logos/github.svg" alt="Logo github" height="40">
          </div>
          <q-tooltip>{{ portfolioData.links.github.label }}</q-tooltip>
        </a>
      </div>
      <div class="col-4 col-sm-2 square">
        <a :href="portfolioData.links.gitlab.href" target="_blank" >
          <div class="bento-block q-pa-sm fit flex flex-center">
            <img src="/logos/gitlab.svg" alt="Logo gitlab" height="40">
          </div>
          <q-tooltip>{{ portfolioData.links.gitlab.label }}</q-tooltip>
        </a>
      </div>
      <div class="col-4 col-sm-2 square">
        <q-btn-toggle
          :model-value="langModel"
          no-caps
          rounded
          spread
          class="bento-block fit"
          unelevated
          text-color="primary"
          :options="[
            { label: '🇫🇷', value: 'fr' },
            { label: '🇬🇧', value: 'en' }
          ]"
          @click="switchLang()"
        />
        <q-tooltip>{{ useGetText('lang.switch') }}</q-tooltip>
      </div>
      <div class="col-4 col-sm-2 square">
        <a :href="portfolioData.links.email.href" target="_blank" >
          <div class="bento-block q-pa-sm fit flex flex-center">
            <q-icon class="link text-primary" name="mail" size="md" />
          </div>
          <q-tooltip>{{ portfolioData.links.email.label }}</q-tooltip>
        </a>
      </div>
      <div class="col-4 col-sm-2 square">
        <q-btn-toggle
          :model-value="$q.dark.isActive"
          no-caps
          rounded
          spread
          class="bento-block fit"
          unelevated
          text-color="primary"
          :options="[
            { label: '🌙', value: true },
            { label: '☀️', value: false }
          ]"
          @click="toggleDark()"
        >
          <q-tooltip>{{ useGetText(`dark.${$q.dark.mode ? 'light' : 'dark'}`) }}</q-tooltip>
        </q-btn-toggle>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useQuasar } from 'quasar'
import { portfolioData } from 'src/composables/data'
import { useGetText, switchLang, langModel } from 'src/composables/misc'

// Dark mode
const $q = useQuasar()
function toggleDark () { $q.dark.toggle() }
</script>

<style scoped>
.square {
  aspect-ratio : 1 / 1;
}
</style>
