<template>
  <div class="bento-block q-pa-md" style="flex: .1 0 0px;">
    <div class="row">
      <div class="col-12 col-sm-3 text-right" style="min-height:50px">
        <div class="fit" style="background-image: url(/logo_animated.gif);background-size: contain;background-repeat: no-repeat;background-position: center;" />
      </div>
      <div class="col-12 col-sm-9">
        <h1 class="text-h3 q-mb-sm q-mt-none">
          {{ useGetText('main.title') }}
          <span class="text-primary">Bastien Champin</span>
        </h1>
        <h2 class="text-h6 text-grey-6 q-mt-none q-mb-sm">
          {{ useGetText('main.subtitle') }}
        </h2>
        <div class="flex items-center justify-between">
          <div class="text-body2 text-italic">
            {{ useGetText('main.caption') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useGetText } from 'src/composables/misc'
</script>
