import { ref, watchEffect } from "vue";

const STORAGE_KEY = "theme";

function getInitialIsDark(): boolean {
  if (typeof window === "undefined") return false;
  const stored = window.localStorage.getItem(STORAGE_KEY);
  if (stored === "dark") return true;
  if (stored === "light") return false;
  return window.matchMedia?.("(prefers-color-scheme: dark)").matches ?? false;
}

// Module-level singleton: dark mode is a single global toggle per app, not a
// fresh ref per call site. Initialized lazily on first useDarkMode() call
// rather than at module-eval time, so apps that never touch dark mode don't
// pay for the localStorage/matchMedia read and DOM write on import.
let isDark: ReturnType<typeof ref<boolean>> | undefined;

export function useDarkMode() {
  if (!isDark) {
    isDark = ref(getInitialIsDark());
    if (typeof window !== "undefined") {
      watchEffect(() => {
        document.documentElement.setAttribute("data-theme", isDark!.value ? "dark" : "light");
        window.localStorage.setItem(STORAGE_KEY, isDark!.value ? "dark" : "light");
      });
    }
  }

  function toggle() {
    isDark!.value = !isDark!.value;
  }
  return { isDark, toggle };
}
