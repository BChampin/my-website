<template>
  <div class="slider">
    <div class="slide-track">
      <div
        v-for="(item, iItem) of infiniteItems"
        :key="iItem"
        class="slide flex flex-center cursor-pointer"
      >
        <img
          :src="item.icon"
          class="slide-item"
          @click="handleClick(item)"
        >
        <q-tooltip>
          {{ item.label }}
        </q-tooltip>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { Tech } from 'src/composables/models'

const props = defineProps<{
  items: Tech[]
}>()

const infiniteItems = computed(() => {
  return [...props.items, ...props.items]
})

function handleClick (item: Tech) {
  window.open(item.link, '_blank')
}
</script>

<style scoped>
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-100px * 4)); /* half nb items in easyRecruitClients - avatar = 80 + 20 margin */
  }
}
.slider {
  height: 80px;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  overflow: hidden;
  position: relative;
  width: 90%;
}

.slider::before, .slider::after {
  background: linear-gradient(to right, rgb(var(--background-rgb)) 0%, rgba(var(--background-rgb), 0) 100%);
  content: "";
  height: 100px;
  position: absolute;
  width: 60px;
  z-index: 2;
}
.slider::after {
  right: 0;
  top: 0;
  transform: rotateZ(180deg);
}
.slider::before {
  left: 0;
  top: 0;
}
.slider .slide-track {
  animation: scroll 30s linear infinite;
  display: flex;
  width: calc(100px * 8); /* nb items in easyRecruitClients */
}
.slider .slide {
  height: 80px;
  width: 100px;
}

.slide-item {
  margin-left:10px;
  margin-right:10px;
  height: 100%;
  width: 100%;
  max-height:80px;
  max-width:80px;
  zoom: 50%;

  transition: all .3s ease;
  -webkit-transition: all .3s ease;
  filter: grayscale(1);
}
.slide-item:hover {
  filter: none;
}

</style>
