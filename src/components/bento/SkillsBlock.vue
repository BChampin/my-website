<template>
  <div class="bento-block q-pa-md" style="flex: .1 0 0px;">
    <div class="text-primary text-h6">
      {{ useGetText('skillsSection') }}
    </div>
    <div v-if="$q.screen.height < 750 || $q.screen.lt.md">
      <infinite-carousel
        :items="portfolioData.skills.map(section => section.tools).flat()"
      />
    </div>
    <template v-else>
      <div
        v-for="(section, i) of portfolioData.skills"
        :key="i"
        class="q-mt-md"
      >
        <div class="text-body2 text-italic">
          {{ useGetText('label', section) }}
        </div>
        <infinite-carousel
          :items="section.tools"
        />
      </div>
    </template>
  </div>
</template>

<script setup lang="ts">
import { useQuasar } from 'quasar'
import { useGetText } from 'src/composables/misc'
import { portfolioData } from 'src/composables/data'
import InfiniteCarousel from 'src/components/InfiniteCarousel.vue'

const $q = useQuasar()
</script>
