<template>
  <svg
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.8"
    stroke-linecap="round"
    stroke-linejoin="round"
    :class="props.class"
    aria-hidden="true"
  >
    <template v-if="props.name === 'home'">
      <polyline points="4,11 12,4 20,11" />
      <path d="M6 10 V20 H18 V10" />
    </template>
    <template v-else-if="props.name === 'users'">
      <circle cx="9" cy="8" r="3.2" />
      <path d="M3.5 19 C3.5 14.5 14.5 14.5 14.5 19" />
      <circle cx="17.5" cy="9" r="2.4" />
      <path d="M14.7 12 C19.5 12.3 20.5 15.5 20.5 19" />
    </template>
    <template v-else-if="props.name === 'heart'">
      <path
        d="M12 20 C6 15.5 3 12.3 3 8.7 C3 6 5.1 4 7.6 4 C9.3 4 10.7 5 12 6.5 C13.3 5 14.7 4 16.4 4 C18.9 4 21 6 21 8.7 C21 12.3 18 15.5 12 20 Z"
      />
    </template>
    <template v-else-if="props.name === 'video'">
      <rect x="3" y="6" width="12" height="12" rx="2" />
      <polygon points="15,10 21,7 21,17 15,14" />
    </template>
    <template v-else-if="props.name === 'menu'">
      <line x1="3" y1="6" x2="21" y2="6" />
      <line x1="3" y1="12" x2="21" y2="12" />
      <line x1="3" y1="18" x2="21" y2="18" />
    </template>
    <template v-else-if="props.name === 'close'">
      <line x1="5" y1="5" x2="19" y2="19" />
      <line x1="19" y1="5" x2="5" y2="19" />
    </template>
    <template v-else-if="props.name === 'sun'">
      <circle cx="12" cy="12" r="4.5" />
      <line x1="12" y1="2.5" x2="12" y2="5" />
      <line x1="12" y1="19" x2="12" y2="21.5" />
      <line x1="2.5" y1="12" x2="5" y2="12" />
      <line x1="19" y1="12" x2="21.5" y2="12" />
      <line x1="4.9" y1="4.9" x2="6.6" y2="6.6" />
      <line x1="17.4" y1="17.4" x2="19.1" y2="19.1" />
      <line x1="4.9" y1="19.1" x2="6.6" y2="17.4" />
      <line x1="17.4" y1="6.6" x2="19.1" y2="4.9" />
    </template>
    <template v-else-if="props.name === 'moon'">
      <path d="M20 14.5 A8.5 8.5 0 1 1 9.5 4 A7 7 0 0 0 20 14.5 Z" />
    </template>
    <template v-else-if="props.name === 'eye'">
      <path
        d="M2.5 12 C5 7 8.3 5 12 5 C15.7 5 19 7 21.5 12 C19 17 15.7 19 12 19 C8.3 19 5 17 2.5 12 Z"
      />
      <circle cx="12" cy="12" r="2.8" />
    </template>
    <template v-else-if="props.name === 'eye-slash'">
      <path
        d="M2.5 12 C5 7 8.3 5 12 5 C15.7 5 19 7 21.5 12 C19 17 15.7 19 12 19 C8.3 19 5 17 2.5 12 Z"
      />
      <circle cx="12" cy="12" r="2.8" />
      <line x1="3" y1="21" x2="21" y2="3" />
    </template>
    <template v-else-if="props.name === 'bell'">
      <path
        d="M6 10.5 C6 6.5 8.5 4 12 4 C15.5 4 18 6.5 18 10.5 C18 15 19.5 16.5 19.5 16.5 H4.5 C4.5 16.5 6 15 6 10.5 Z"
      />
      <path d="M10 19 a2 2 0 0 0 4 0" />
    </template>
    <template v-else-if="props.name === 'bell-slash'">
      <path
        d="M6 10.5 C6 6.5 8.5 4 12 4 C15.5 4 18 6.5 18 10.5 C18 15 19.5 16.5 19.5 16.5 H4.5 C4.5 16.5 6 15 6 10.5 Z"
      />
      <path d="M10 19 a2 2 0 0 0 4 0" />
      <line x1="3" y1="21" x2="21" y2="3" />
    </template>
  </svg>
</template>

<script setup lang="ts">
const props = defineProps<{
  name:
    | "home"
    | "users"
    | "heart"
    | "video"
    | "menu"
    | "close"
    | "sun"
    | "moon"
    | "eye"
    | "eye-slash"
    | "bell"
    | "bell-slash";
  class?: string;
}>();
</script>
