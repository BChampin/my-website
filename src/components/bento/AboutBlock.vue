<template>
  <div class="bento-block q-pa-md block-about overflow-hidden">
    <div
      class="flex justify-between"
      :class="{ 'no-wrap': $q.screen.gt.sm }"
    >
      <div class="text-primary text-h6">
        {{ useGetText('about.title') }}
      </div>
      <q-tabs
        v-model="aboutTab"
        inline-label
        dense
        no-caps
        class="text-primary br-25"
      >
        <q-tab name="experiences" :label="useGetText('about.experiences')" />
        <q-tab name="studies" :label="useGetText('about.studies')" />
      </q-tabs>
    </div>
    <q-tab-panels v-model="aboutTab" animated class="bg-transparent">
      <q-tab-panel name="experiences" class="q-pa-none overflow-hidden">
        <timeline-component :items="portfolioData.experiences" />
      </q-tab-panel>
      <q-tab-panel name="studies" class="q-pa-none overflow-hidden">
        <timeline-component :items="portfolioData.studies" />
      </q-tab-panel>
    </q-tab-panels>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useGetText } from 'src/composables/misc'
import { portfolioData } from 'src/composables/data'
import TimelineComponent from 'src/components/TimelineComponent.vue'

const aboutTab = ref<string>('experiences')
</script>

<style scoped>
.bg-transparent {
  background-color: rgba(0, 0, 0, 0);
}
@media (max-width: 1199px) {
  .block-about {
    flex: auto;
    min-height: 450px;
  }
}

</style>
