<template>
  <div class="bento-wrapper">
    <div class="bento-left">
      <MainBlock />
      <ProjectsBlock />
      <ContactBlock class="max-[1199px]:hidden" />
    </div>

    <div class="bento-right">
      <LinksBlock class="max-[1199px]:hidden" />
      <SkillsBlock />
      <AboutBlock />
      <ContactBlock class="min-[1200px]:hidden" />
      <LinksBlock class="min-[1200px]:hidden" />
    </div>
  </div>
</template>

<script setup lang="ts">
import MainBlock from "./components/MainBlock.vue";
import ProjectsBlock from "./components/ProjectsBlock.vue";
import ContactBlock from "./components/ContactBlock.vue";
import LinksBlock from "./components/LinksBlock.vue";
import SkillsBlock from "./components/SkillsBlock.vue";
import AboutBlock from "./components/AboutBlock.vue";
</script>

<style scoped>
.bento-wrapper {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  gap: 20px;
  height: 100vh;
  width: 100%;
  padding: 20px;
  overflow: hidden;
}
.bento-left {
  display: flex;
  flex: 1.5 0 0px;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  height: 100%;
  width: 1px;
  overflow: hidden;
}
.bento-right {
  display: flex;
  flex: 0.7 0 0px;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  height: 100%;
  width: 1px;
  overflow: visible;
}
@media (max-width: 1199px) {
  .bento-wrapper {
    flex-direction: column;
    height: min-content;
  }
  .bento-left,
  .bento-right {
    flex: none;
    height: min-content;
    width: 100%;
  }
}
</style>
