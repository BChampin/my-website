import { ref, watchEffect } from "vue";

// colorblind/muted are rpg-tp-specific toggles (unlike dark mode, which is
// shared via @my-website/ui's useDarkMode) — module singletons, same pattern.

function persistedBoolean(key: string, defaultValue: boolean) {
  const stored = typeof window !== "undefined" ? window.localStorage.getItem(key) : null;
  const initial = stored === null ? defaultValue : stored === "true";
  const value = ref(initial);
  if (typeof window !== "undefined") {
    watchEffect(() => window.localStorage.setItem(key, String(value.value)));
  }
  return value;
}

const colorblind = persistedBoolean("colorblind", false);
const muted = persistedBoolean("muted", false);

if (typeof window !== "undefined") {
  watchEffect(() =>
    document.documentElement.setAttribute("data-colorblind", String(colorblind.value)),
  );
}

export function useRpgTpSettings() {
  function toggleColorblind() {
    colorblind.value = !colorblind.value;
  }
  function toggleMuted() {
    muted.value = !muted.value;
  }
  return { colorblind, toggleColorblind, muted, toggleMuted };
}
