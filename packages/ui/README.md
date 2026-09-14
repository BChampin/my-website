# @my-website/ui

Shared Vue 3 layer consumed by every app in `apps/`: components, composables,
and the Tailwind preset that defines the trunk's design-token contract.

Consumed directly from source via the pnpm workspace (`workspace:*`) — no
build step needed for local dev, since each app's own Vite/Tailwind pipeline
compiles it.

## Layout

- `src/components/` — shared Vue components (layout shell, ThemeToggle,
  LangSwitch, Card/Timeline, …). Populated as they get extracted while
  rewriting each site — nothing here yet.
- `src/composables/` — shared composition functions (`useDarkMode`,
  `useLocalization`, `useLocalStorage`, fetch helpers, …). Same as above,
  populated on demand.
- `src/tailwind/preset.css` — the shared design-token contract: a fixed set
  of `--theme-*` CSS custom properties mapped into Tailwind's `@theme` color
  namespace. Every app defines its **own** values for those variables (plus
  any site-specific semantic colors it needs) in its own `src/theme.css`.

## Theming convention

This generalizes the CSS-variable theme pattern already used by rpg-tp
(`--theme-1..8`, with a `[data-theme='dark']` override block), since it's
already framework-agnostic and dark-mode-aware.

An app's entry CSS imports, in order:

```css
@import "tailwindcss";
@import "./theme.css"; /* this app's own palette */
@import "@my-website/ui/tailwind/preset.css"; /* maps it into Tailwind's @theme */
```

`theme.css` defines `:root { --theme-1: #...; }` and
`[data-theme='dark'] { --theme-1: #...; }` for each of the 8 slots (plus any
extra site-specific tokens, e.g. rpg-tp's difficulty-grade colors) — the
preset only maps the shared contract, it never hardcodes actual colors.
