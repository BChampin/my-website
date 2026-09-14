<template>
  <Card class="flex flex-1 flex-col overflow-hidden">
    <div class="mb-4 text-lg font-semibold text-theme-6">{{ t("projectSection.title") }}</div>

    <div class="grid grid-cols-1 gap-4 overflow-y-auto sm:grid-cols-2">
      <button
        v-for="(project, i) of portfolioData.projects.main"
        :key="i"
        type="button"
        class="project-thumbnail relative aspect-video cursor-pointer overflow-hidden rounded-[17px]"
        @click="open(project)"
      >
        <img
          :src="project.cover"
          loading="lazy"
          class="project-cover absolute inset-0 h-full w-full object-cover"
        />
        <div
          class="project-name absolute inset-0 flex items-end bg-gradient-to-t from-black to-transparent"
        >
          <div class="flex w-full items-center justify-between gap-2 p-3 text-white">
            <img :src="project.icon" class="h-8 max-w-8" />
            <div class="font-semibold">{{ t("title", project) }}</div>
            <span aria-hidden="true">⤢</span>
          </div>
        </div>
      </button>
    </div>

    <dialog ref="dialogEl" class="project-dialog" @click="onBackdropClick" @close="selected = null">
      <div v-if="selected" class="max-h-[90vh] w-[min(90vw,900px)] overflow-y-auto p-4">
        <div class="flex items-start justify-between gap-4">
          <div class="text-2xl font-bold text-theme-6">{{ t("title", selected) }}</div>
          <div class="flex items-center gap-2">
            <a
              :href="selected.link"
              target="_blank"
              rel="noopener"
              class="rounded-[25px] border-2 border-theme-5 px-3 py-1 text-sm whitespace-nowrap hover:bg-theme-8"
            >
              Check it out !
            </a>
            <button
              type="button"
              class="rounded-full border-2 border-theme-5 px-2 py-1 hover:bg-theme-8"
              @click="close"
            >
              ✕
            </button>
          </div>
        </div>

        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
          <div>
            <div class="text-xs text-theme-4 uppercase">{{ t("projectSection.context") }}</div>
            <div class="font-medium">{{ t("context", selected) }}</div>
            <div class="mt-2 text-xs text-theme-4 uppercase">{{ t("projectSection.dates") }}</div>
            <div class="font-medium">{{ selected.dates }}</div>
            <div class="mt-2 text-xs text-theme-4 uppercase">{{ t("projectSection.techs") }}</div>
            <div v-for="(tech, i) of selected.techs" :key="i" class="font-medium">
              <a :href="tech.link" target="_blank" rel="noopener" class="link">{{ tech.label }}</a>
            </div>
          </div>
          <div>
            <div class="text-xs text-theme-4 uppercase">{{ t("projectSection.description") }}</div>
            <div>{{ t("description", selected) }}</div>
          </div>
        </div>

        <div v-for="(image, i) of selected.gallery" :key="i" class="mt-4">
          <img :src="image" loading="lazy" class="w-full rounded-[17px]" />
        </div>
      </div>
    </dialog>
  </Card>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { Card } from "@my-website/ui";
import { t } from "../i18n";
import { portfolioData } from "../data";

type Project = (typeof portfolioData.projects.main)[number];

const dialogEl = ref<HTMLDialogElement>();
const selected = ref<Project | null>(null);

function open(project: Project) {
  selected.value = project;
  dialogEl.value?.showModal();
}
function close() {
  dialogEl.value?.close();
}
function onBackdropClick(e: MouseEvent) {
  if (e.target === dialogEl.value) close();
}
</script>

<style scoped>
.project-thumbnail .project-cover,
.project-thumbnail .project-name {
  transition: 0.6s;
}
.project-thumbnail:hover .project-cover {
  transform: scale(1.1);
}
.project-thumbnail .project-name {
  opacity: 0;
}
.project-thumbnail:hover .project-name {
  opacity: 1;
}
@media (max-width: 599px) {
  .project-thumbnail .project-name {
    opacity: 1;
  }
}

.project-dialog {
  border: none;
  border-radius: 25px;
  background-color: var(--theme-2);
  color: var(--theme-3);
  padding: 0;
}
.project-dialog::backdrop {
  background-color: rgba(0, 0, 0, 0.5);
}
</style>
