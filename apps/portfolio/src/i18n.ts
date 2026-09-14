import { useLocalization } from "@my-website/ui";
import { portfolioData } from "./data";

export const { lang, switchLang, t } = useLocalization(portfolioData, {
  langs: ["fr", "en"],
  defaultLang: "fr",
});
