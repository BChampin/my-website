import { ref } from "vue";

const expandedTitle = ref<string | null>(null);

export function useExpandedProject() {
  function toggle(title: string) {
    expandedTitle.value = expandedTitle.value === title ? null : title;
  }
  return { expandedTitle, toggle };
}
