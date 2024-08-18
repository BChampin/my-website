<template>
  <div class="bento-block q-pt-md" style="flex: 1 0 0px;">
    <div class="text-primary text-h6 q-ml-md q-mb-md">
      {{ useGetText('projectSection.title') }}
    </div>

    <div class="row items-center justify-evenly">
      <div
        v-for="(project, iProject) of portfolioData.projects.main"
        :key="iProject"
        class="col-12 col-sm-6 q-pa-sm"
        style="max-width: 450px;"
      >
        <q-card
          class="br-25 cursor-pointer overflow-hidden project-thumbnail"
          @click="selectedProject = project; projectDialog = true;"
        >
          <div class="project-gradient fit" />
          <img class="project-cover fit" loading="lazy" :src="project.cover" />
          <div class="project-name absolute flex fit items-end text-subtitle1 text-bold">
            <div class="q-pa-sm q-pl-md flex items-center justify-between q-gutter-x-sm no-wrap text-white">
              <img :src="project.icon" style="max-width:30px; max-height:30px"/>
              <div>
                {{ useGetText('title', project) }}
              </div>
              <q-icon name="open_in_full" />
            </div>
          </div>
        </q-card>
      </div>
    </div>

    <!-- Dialog -->
    <q-dialog
      v-model="projectDialog"
      style="background-color:rgba(200, 200, 200, 0.8)"
      :maximized="$q.screen.lt.sm"
      @hide="projectDialog = false;"
    >
      <q-scroll-area
        v-if="selectedProject"
        class="q-pa-sm q-pr-md"
        style="height: 99vh; min-width: 70vw;"
      >
        <div class="row">
          <q-card class="bento-block q-pa-md bg-background">
            <div class="row justify-between">
              <div class="q-mb-sm text-h4 text-primary">
                {{ useGetText('title', selectedProject) }}
              </div>
              <div class="flex items-center q-gutter-x-sm">
                <q-btn
                  no-caps
                  rounded
                  outline
                  icon-right="open_in_new"
                  :href="selectedProject.link"
                  target="_blank"
                  :label="$q.screen.gt.xs ? 'Check it out !' : ''"
                />
                <q-btn
                  v-close-popup
                  round
                  class="br-25"
                  outline
                  dense
                  icon="close"
                />
              </div>
            </div>
          </q-card>
        </div>
        <div class="row q-mt-md q-col-gutter-x-md">
          <div class="col-12 col-sm-6">
            <q-card class="bento-block q-pa-md fit bg-background">
              <div class="text-grey-5 text-uppercase">
                {{ useGetText('projectSection.context') }}
              </div>
              <div class="text-weight-medium">
                {{ useGetText('context', selectedProject) }}
              </div>
              <div class="q-mt-md text-grey-5 text-uppercase">
                {{ useGetText('projectSection.dates') }}
              </div>
              <div class="text-weight-medium">
                {{ useGetText('dates', selectedProject) }}
              </div>
              <div class="q-mt-md text-grey-5 text-uppercase">
                {{ useGetText('projectSection.techs') }}
              </div>
              <div
                v-for="(tech, i) of selectedProject.techs"
                :key="i"
                class="q-mb-md text-weight-medium"
              >
                <a :href="tech.link" target="_blank" class="link">
                  {{ tech.label }}
                </a>
              </div>
            </q-card>
          </div>
          <div class="col-12 col-sm-6">
            <q-card class="bento-block q-pa-md fit bg-background">
              <div class="text-grey-5 text-uppercase">
                {{ useGetText('projectSection.description') }}
              </div>
              {{ useGetText('description', selectedProject) }}
            </q-card>
          </div>
        </div>
        <div
          v-for="(image, iImage) of selectedProject.gallery"
          :key="iImage"
          class="row q-pt-md"
        >
          <q-card class="bento-block bg-background">
            <img class="project-cover fit" loading="lazy" :src="image" />
          </q-card>
        </div>
      </q-scroll-area>
    </q-dialog>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { useQuasar } from 'quasar'
import { Project } from 'src/composables/models'
import { useGetText } from 'src/composables/misc'
import { portfolioData } from 'src/composables/data'

const $q = useQuasar()

// Project dialog
const selectedProject = ref<Project>()
const projectDialog = ref<boolean>(false)
</script>

<style scoped>
body.body--light .project-thumbnail .project-gradient {
  background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 30%, rgba(0,169,255,1) 70%, rgba(0,169,255,1) 100%);
}

body.body--dark .project-thumbnail .project-gradient {
  background: linear-gradient(135deg, rgba(18,18,18,1) 0%, rgba(18,18,18,1) 30%, rgba(0,169,255,1) 70%, rgba(0,169,255,1) 100%);
}

.project-thumbnail {
  aspect-ratio : 16 / 9;
  border-radius: 17px;

  .project-gradient {
    position: absolute;
    animation: rotateGradient 10s linear infinite;
  }

  .project-name {
    transition: .6s;
    opacity: 0;
    background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
    position: absolute;
    z-index: 3;
  };
  .project-cover {
    transition: .6s;
    position: absolute;
    z-index: 2;
  }
  &:hover {
    .project-name {
      opacity:1;
      bottom: 0px;
    }
    .project-cover {
      transform: scale(1.1);
    }
  }
  /* Force dfiplay on small screens */
  @media screen and (max-width: 599px) {
    .project-name {
      opacity:1;
      bottom: 0px;
    }
  }
}

@keyframes rotateGradient {
  from {
    transform: rotate(0deg) scale(2);
  }
  to {
    transform: rotate(360deg) scale(2);
  }
};
</style>
