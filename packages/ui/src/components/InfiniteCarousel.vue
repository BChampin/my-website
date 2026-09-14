<template>
  <div class="carousel">
    <div class="track">
      <a
        v-for="(item, i) of infiniteItems"
        :key="i"
        :href="item.link"
        target="_blank"
        rel="noopener"
        :title="item.label"
        class="slide"
      >
        <img :src="item.icon" :alt="item.label" class="slide-item" />
      </a>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from "vue";
import type { CarouselItem } from "../types";

const props = defineProps<{ items: CarouselItem[] }>();

// Doubled so the track can loop seamlessly on a -50% translate, regardless
// of how many items there are.
const infiniteItems = computed(() => [...props.items, ...props.items]);
</script>

<style scoped>
@keyframes scroll {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(-50%);
  }
}
.carousel {
  position: relative;
  display: flex;
  overflow: hidden;
  width: 100%;
  height: 80px;
}
.carousel::before,
.carousel::after {
  content: "";
  position: absolute;
  top: 0;
  width: 60px;
  height: 100%;
  z-index: 2;
  background: linear-gradient(to right, var(--theme-2), transparent);
}
.carousel::before {
  left: 0;
}
.carousel::after {
  right: 0;
  transform: rotate(180deg);
}
.track {
  display: flex;
  animation: scroll 30s linear infinite;
}
.slide {
  display: flex;
  flex: 0 0 100px;
  height: 80px;
  align-items: center;
  justify-content: center;
}
.slide-item {
  height: 50%;
  max-height: 40px;
  margin-inline: 10px;
  filter: grayscale(1);
  transition: filter 0.3s ease;
}
.slide-item:hover {
  filter: none;
}
</style>
