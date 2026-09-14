import { ref } from "vue";
import type { Translatable } from "../types";

function getByPath(obj: unknown, path: string): unknown {
  if (!path) return undefined;
  const segments = path.match(/[^[.\]]+/g);
  if (!segments) return undefined;
  return segments.reduce<unknown>((acc, key) => {
    if (acc && typeof acc === "object") return (acc as Record<string, unknown>)[key];
    return undefined;
  }, obj);
}

function isTranslatable(value: unknown): value is Translatable {
  return (
    !!value &&
    typeof value === "object" &&
    !Array.isArray(value) &&
    ("en" in value || "fr" in value)
  );
}

/**
 * Generic {en,fr,...}-shaped i18n helper: a `lang` ref, a `switchLang`
 * cycling through `langs`, and a `t(path, source?)` getter that resolves a
 * dotted path against `data` (or an explicit `source`) and unwraps
 * translatable `{en, fr}` objects for the current language.
 */
export function useLocalization<T extends object>(
  data: T,
  options: { langs?: string[]; defaultLang?: string } = {},
) {
  const langs = options.langs ?? ["en", "fr"];
  const lang = ref(options.defaultLang ?? langs[0]);

  function switchLang() {
    const idx = langs.indexOf(lang.value);
    lang.value = langs[(idx + 1) % langs.length];
  }

  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  function t(path: string, source?: object): any {
    const value = getByPath(source ?? data, path);
    return isTranslatable(value) ? value[lang.value] : value;
  }

  return { lang, langs, switchLang, t };
}
