<template>
  <ul class="flex flex-col">
    <li
      v-for="project of projects"
      :key="project.title"
      class="border-b border-theme-5 last:border-b-0"
    >
      <button
        type="button"
        class="flex w-full cursor-pointer items-center gap-4 py-4 text-left"
        :aria-expanded="expandedTitle === project.title"
        @click="toggle(project.title)"
      >
        <img :src="project.icon" :alt="project.title" class="h-8 w-8 shrink-0" />
        <span class="flex-1 font-semibold">{{ t("title", project) }}</span>
        <span class="text-sm whitespace-nowrap text-theme-4">{{ project.dates }}</span>
        <span
          aria-hidden="true"
          class="text-lg text-theme-4 transition-transform duration-300"
          :class="{ 'rotate-45': expandedTitle === project.title }"
          >+</span
        >
      </button>

      <div
        class="grid transition-[grid-template-rows] duration-300 ease-in-out"
        :style="{ gridTemplateRows: expandedTitle === project.title ? '1fr' : '0fr' }"
      >
        <div class="overflow-hidden">
          <div
            class="pb-8 transition-opacity duration-300"
            :class="expandedTitle === project.title ? 'opacity-100 delay-100' : 'opacity-0'"
          >
            <div
              class="grid grid-cols-[minmax(4.5rem,auto)_1fr] items-start gap-x-4 gap-y-2 text-sm"
            >
              <div class="text-theme-4 uppercase">{{ t("projectSection.context") }}</div>
              <div class="font-medium">{{ t("context", project) }}</div>
              <div class="pt-0.5 text-theme-4 uppercase">{{ t("projectSection.techs") }}</div>
              <div class="flex flex-wrap gap-2">
                <TechChip
                  v-for="(tech, ti) of project.techs"
                  :key="ti"
                  :href="tech.link"
                  :icon="tech.icon"
                  :label="tech.label"
                />
              </div>
            </div>

            <p class="mt-6 max-w-prose">{{ t("description", project) }}</p>
            <a :href="project.link" target="_blank" rel="noopener" class="link mt-2 inline-block">
              {{ t("projectSection.cta") }}
            </a>

            <div
              v-if="project.gallery.length"
              class="thin-scroll mt-6 flex gap-3 overflow-x-auto pb-1"
            >
              <button
                v-for="(image, gi) of project.gallery"
                :key="gi"
                type="button"
                class="shrink-0 cursor-pointer"
                @click="lightboxImage = image"
              >
                <img :src="image" loading="lazy" class="h-40 w-auto rounded object-cover" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </li>
  </ul>

  <Teleport to="body">
    <Transition name="lightbox">
      <div
        v-if="lightboxImage"
        class="fixed inset-0 z-50 flex cursor-zoom-out items-center justify-center bg-black/85 p-6"
        @click="lightboxImage = null"
      >
        <img :src="lightboxImage" class="max-h-[90vh] max-w-[90vw] rounded object-contain" />
      </div>
    </Transition>
  </Teleport>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { t } from "../i18n";
import type { Project } from "../data";
import { useExpandedProject } from "../composables/useExpandedProject";
import TechChip from "./TechChip.vue";

defineProps<{ projects: Project[] }>();

const { expandedTitle, toggle } = useExpandedProject();
const lightboxImage = ref<string | null>(null);
</script>

<style scoped>
.lightbox-enter-active,
.lightbox-leave-active {
  transition: opacity 0.2s ease;
}
.lightbox-enter-active img,
.lightbox-leave-active img {
  transition: transform 0.2s ease;
}
.lightbox-enter-from,
.lightbox-leave-to {
  opacity: 0;
}
.lightbox-enter-from img,
.lightbox-leave-to img {
  transform: scale(0.96);
}
</style>
