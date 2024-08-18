<template>
  <q-page class="overflow-hidden">
    <div class="bento-wrapper">
      <div class="bento-left">
        <MainBlock />
        <ProjectsBlock />
        <ContactBlock class="gt-sm" />
      </div>

      <div class="bento-right">
        <LinksBlock class="gt-sm" />
        <SkillsBlock />
        <AboutBlock />
        <ContactBlock class="lt-md" />
        <LinksBlock class="lt-md" />
      </div>
    </div>
  </q-page>
</template>

<script setup lang="ts">
import MainBlock from 'src/components/bento/MainBlock.vue'
import ProjectsBlock from 'src/components/bento/ProjectsBlock.vue'
import ContactBlock from 'src/components/bento/ContactBlock.vue'
import LinksBlock from 'src/components/bento/LinksBlock.vue'
import SkillsBlock from 'src/components/bento/SkillsBlock.vue'
import AboutBlock from 'src/components/bento/AboutBlock.vue'

defineOptions({
  name: 'IndexPage'
})
</script>
