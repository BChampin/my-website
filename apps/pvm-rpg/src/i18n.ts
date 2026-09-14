import { useDictionary } from "@my-website/ui";
import fr from "./locales/fr.json";
import en from "./locales/en.json";

export const { lang, switchLang, t } = useDictionary({ fr, en }, { defaultLang: "fr" });
