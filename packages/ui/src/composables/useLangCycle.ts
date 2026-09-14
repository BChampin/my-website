import { ref } from "vue";

/**
 * Shared `lang` ref + `switchLang` cycling behind useLocalization and
 * useDictionary — internal, not part of the package's public API.
 */
export function useLangCycle<L extends string>(langs: L[], defaultLang?: L) {
  const lang = ref<L>(defaultLang ?? langs[0]!);

  function switchLang() {
    const idx = langs.indexOf(lang.value);
    lang.value = langs[(idx + 1) % langs.length]!;
  }

  return { lang, switchLang };
}
