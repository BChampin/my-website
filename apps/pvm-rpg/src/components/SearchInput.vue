<template>
  <div class="relative">
    <Icon
      name="search"
      class="pointer-events-none absolute top-1/2 left-2 h-4 w-4 -translate-y-1/2 text-theme-4"
    />
    <input
      :value="modelValue"
      type="text"
      :placeholder="placeholder"
      class="rounded-full border-2 border-theme-5 bg-theme-2 py-1.5 pr-3 pl-8 text-sm outline-none focus:border-theme-6"
      @input="emit('update:modelValue', ($event.target as HTMLInputElement).value)"
    />
  </div>
</template>

<script setup lang="ts">
import Icon from "./Icon.vue";

defineProps<{
  modelValue: string;
  placeholder?: string;
}>();

const emit = defineEmits<{ "update:modelValue": [value: string] }>();
</script>
