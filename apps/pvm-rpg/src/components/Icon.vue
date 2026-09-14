<template>
  <svg
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
    :class="props.class"
    aria-hidden="true"
  >
    <template v-if="props.name === 'menu'">
      <line x1="3" y1="6" x2="21" y2="6" />
      <line x1="3" y1="12" x2="21" y2="12" />
      <line x1="3" y1="18" x2="21" y2="18" />
    </template>
    <template v-else-if="props.name === 'close'">
      <line x1="5" y1="5" x2="19" y2="19" />
      <line x1="19" y1="5" x2="5" y2="19" />
    </template>
    <template v-else-if="props.name === 'home'">
      <polyline points="4,11 12,4 20,11" />
      <path d="M6 10 V20 H18 V10" />
    </template>
    <template v-else-if="props.name === 'flag'">
      <line x1="5" y1="3" x2="5" y2="21" />
      <path d="M5 4 H18 L15 9 L18 14 H5" />
    </template>
    <template v-else-if="props.name === 'users'">
      <circle cx="9" cy="8" r="3.2" />
      <path d="M3.5 19 C3.5 14.5 14.5 14.5 14.5 19" />
      <circle cx="17.5" cy="9" r="2.4" />
      <path d="M14.7 12 C19.5 12.3 20.5 15.5 20.5 19" />
    </template>
    <template v-else-if="props.name === 'link'">
      <path d="M14 5 H19 V10" />
      <line x1="19" y1="5" x2="11" y2="13" />
      <path d="M17 13 V19 H5 V7 H11" />
    </template>
    <template v-else-if="props.name === 'info'">
      <circle cx="12" cy="12" r="9" />
      <line x1="12" y1="11" x2="12" y2="16.5" />
      <circle cx="12" cy="7.6" r="0.9" fill="currentColor" stroke="none" />
    </template>
    <template v-else-if="props.name === 'map'">
      <polygon points="9,4 4,6 4,20 9,18 15,20 20,18 20,4 15,6 9,4" />
      <line x1="9" y1="4" x2="9" y2="18" />
      <line x1="15" y1="6" x2="15" y2="20" />
    </template>
    <template v-else-if="props.name === 'help'">
      <circle cx="12" cy="12" r="9" />
      <path d="M9.6 9.3 a2.5 2.2 0 1 1 3.9 1.9 c-0.9 0.6 -1.5 1.1 -1.5 2.3" />
      <circle cx="12" cy="16.6" r="0.9" fill="currentColor" stroke="none" />
    </template>
    <template v-else-if="props.name === 'search'">
      <circle cx="10.5" cy="10.5" r="6.5" />
      <line x1="15.5" y1="15.5" x2="20.5" y2="20.5" />
    </template>
    <template v-else-if="props.name === 'chevron-down'">
      <polyline points="5,9 12,16 19,9" />
    </template>
    <template v-else-if="props.name === 'grid'">
      <rect x="4" y="4" width="7" height="7" />
      <rect x="13" y="4" width="7" height="7" />
      <rect x="4" y="13" width="7" height="7" />
      <rect x="13" y="13" width="7" height="7" />
    </template>
    <template v-else-if="props.name === 'list'">
      <line x1="4" y1="6" x2="20" y2="6" />
      <line x1="4" y1="12" x2="20" y2="12" />
      <line x1="4" y1="18" x2="20" y2="18" />
    </template>
  </svg>
</template>

<script setup lang="ts">
const props = defineProps<{
  name:
    | "menu"
    | "close"
    | "home"
    | "flag"
    | "users"
    | "link"
    | "info"
    | "map"
    | "help"
    | "search"
    | "chevron-down"
    | "grid"
    | "list";
  class?: string;
}>();
</script>
