<template>
  <div class="bento-block q-pa-md" style="flex: .1 0 0px;">
    <div class="text-primary text-h6">
      {{ useGetText('contact.title') }}
    </div>
    <div class="q-py-sm">
      {{ useGetText('contact.text') }}
    </div>
    <div class="flex items-center justify-between">
      <q-btn
        flat
        no-caps
        class="br-25"
        icon-right="content_copy"
        :label="useGetText('contact.cta')"
        @click="copyToClipboard(portfolioData.contact.email)"
      />
    </div>
  </div>
</template>

<script setup lang="ts">
import { useGetText } from 'src/composables/misc'
import { copyToClipboard } from 'quasar'
import { portfolioData } from 'src/composables/data'
</script>
