<template>
  <q-timeline layout="dense" color="primary">
    <q-timeline-entry
      v-for="(event, iEvent) of items"
      :key="iEvent"
    >
      <template #subtitle>
        <div class="flex items-center">
          <q-icon name="timer" class="q-mr-sm" size="xs" />
          <span>{{ useGetText('dates', event) }}</span>
          <q-icon name="location_on" class="q-ml-lg q-mr-sm" size="xs" />
          <span>{{ useGetText('location', event) }}</span>
        </div>
      </template>
      <template #title>
        <div class="flex items-center text-body1">
          <span class="text-h6 q-mr-sm">
            {{ useGetText('title', event) }}
          </span>
          <div class="no-wrap">
            <span class="q-mr-sm">@</span>
            <a :href="event.link" target="_blank" class="link">
              {{ useGetText('institution', event) }}
            </a>
          </div>
        </div>
      </template>
    </q-timeline-entry>
  </q-timeline>
</template>

<script setup lang="ts">
import { useGetText } from 'src/composables/misc'
import { TimelineEvent } from 'src/composables/models'

defineProps<{
  items: TimelineEvent[]
}>()
</script>
