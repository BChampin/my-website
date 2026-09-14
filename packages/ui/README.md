# @my-website/ui

Shared Vue 3 layer consumed by every app in `apps/`: components, composables,
and the Tailwind preset that defines the trunk's design-token contract.

Consumed directly from source via the pnpm workspace (`workspace:*`) — no
build step needed for local dev, since each app's own Vite/Tailwind pipeline
compiles it.

## Layout

- `src/components/` — shared Vue components: `Card`, `ThemeToggle`,
  `LangSwitch`, `Timeline`, `InfiniteCarousel`. Extracted while rewriting the
  portfolio (see `PLAN.md` phase 2); extend as later phases find more
  cross-site patterns.
- `src/composables/` — `useDarkMode` (module-singleton, persists to
  `localStorage`, defaults to `prefers-color-scheme`); `useLocalization`
  (generic `{en, fr, ...}`-shaped i18n: a `lang` ref, `switchLang`, and a
  `t(path, source?)` dotted-path getter — for per-field translatable data like
  the portfolio's `data.ts`); `useDictionary` (flat `key -> string` i18n: a
  `lang` ref, `switchLang`, and a `t(key)` getter — for per-locale-file
  content like pvm-rpg/rpg-tp's `fr.json`/`en.json`).
- `src/types.ts` — shared shapes (`Translatable`, `TimelineItem`,
  `CarouselItem`) used by both the components above and each app's own
  `data.ts`.
- `src/tailwind/preset.css` — the shared design-token contract: a fixed set
  of `--theme-*` CSS custom properties mapped into Tailwind's `@theme` color
  namespace. Every app defines its **own** values for those variables (plus
  any site-specific semantic colors it needs) in its own `src/theme.css`.

## Theming convention

This generalizes the CSS-variable theme pattern already used by rpg-tp
(`--theme-1..8`, with a `[data-theme='dark']` override block), since it's
already framework-agnostic and dark-mode-aware. The 8 slots have a fixed
meaning so shared components (`Card`, `ThemeToggle`, …) render sensibly on
every site:

| Slot         | Meaning                                          |
| ------------ | ------------------------------------------------- |
| `--theme-1`  | Page background                                    |
| `--theme-2`  | Surface / card background                          |
| `--theme-3`  | Primary text                                       |
| `--theme-4`  | Secondary text / default link color                |
| `--theme-5`  | Border                                             |
| `--theme-6`  | Accent / brand color (interactive, active states)  |
| `--theme-7`  | Text color to use **on** the accent color          |
| `--theme-8`  | Subtle background (hover states)                   |

An app's entry CSS imports, in order:

```css
@import 'tailwindcss';
@import './theme.css'; /* this app's own palette */
@import '@my-website/ui/tailwind/preset.css'; /* maps it into Tailwind's @theme */
```

`theme.css` defines `:root { --theme-1: #...; }` and
`[data-theme='dark'] { --theme-1: #...; }` for each of the 8 slots (plus any
extra site-specific tokens, e.g. rpg-tp's difficulty-grade colors) — the
preset only maps the shared contract, it never hardcodes actual colors.
`useDarkMode` toggles `data-theme` on `<html>`, so plain CSS custom
properties (not a JS theme object) drive every color.
