<template>
  <NavBar />
  <main class="mx-auto max-w-3xl px-4 sm:px-6">
    <MainBlock id="hero" />
    <AboutBlock id="experience" />
    <ProjectsBlock id="projects" />
    <ExperimentsBlock id="experiments" />
    <SkillsBlock id="skills" />
    <ContactBlock id="contact" />
  </main>
</template>

<script setup lang="ts">
import NavBar from "./components/NavBar.vue";
import MainBlock from "./components/MainBlock.vue";
import AboutBlock from "./components/AboutBlock.vue";
import SkillsBlock from "./components/SkillsBlock.vue";
import ProjectsBlock from "./components/ProjectsBlock.vue";
import ExperimentsBlock from "./components/ExperimentsBlock.vue";
import ContactBlock from "./components/ContactBlock.vue";
</script>
