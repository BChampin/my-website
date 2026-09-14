import { ref } from "vue";

/**
 * Generic flat key -> string dictionary i18n, for sites whose content is
 * translated per-locale-file (rpg-tp/pvm-rpg's `fr.json`/`en.json` pattern)
 * rather than per-field ({en,fr}) like the portfolio's data.ts — see
 * useLocalization for that shape instead.
 */
export function useDictionary<D extends Record<string, Record<string, string>>>(
  dictionaries: D,
  options: { defaultLang?: Extract<keyof D, string> } = {},
) {
  const langs = Object.keys(dictionaries) as Extract<keyof D, string>[];
  const lang = ref<Extract<keyof D, string>>(options.defaultLang ?? langs[0]!);

  function switchLang() {
    const idx = langs.indexOf(lang.value);
    lang.value = langs[(idx + 1) % langs.length]!;
  }

  function t(key: string): string {
    return dictionaries[lang.value]?.[key] ?? key;
  }

  return { lang, langs, switchLang, t };
}
