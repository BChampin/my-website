# my-website — champin.dev trunk monorepo

Personal pnpm workspace monorepo hosting three of Bastien's Trackmania/
portfolio sites from **one** GitHub Pages deploy under `champin.dev`. Built
with `vite-plus` (`vp` CLI). See `PLAN.md` for the migration history/why.

## Layout

- `apps/portfolio` — Vue 3 + Tailwind v4, served at `champin.dev/`.
- `apps/pvm-rpg` — Vue 3 + Tailwind v4 + vue-router + Pinia, served at
  `champin.dev/pvm-rpg/`. Data is **live-fetched** at runtime from a public
  Google Sheet (`stores/sheet.ts`), with a short-TTL sessionStorage cache.
- `apps/rpg-tp` — Vue 3 + Tailwind v4 + vue-router, served at
  `champin.dev/rpg-tp/`. Data is a static typed dataset (`src/rpg-tp.data.ts`).
- `packages/ui` — shared components/composables (`useDarkMode`,
  `useLocalization`, `useDictionary`, `Card`, `ThemeToggle`, `LangSwitch`,
  `Timeline`, `InfiniteCarousel`, …) and the shared Tailwind preset
  (`src/tailwind/preset.css`) defining the `--theme-1..8` semantic slot
  contract. Every app layers its own palette on top of this preset.
- `_archive/` — dead code, excluded from tooling via root
  `.prettierignore`/`.eslintignore`. Historical versions v1–v7 (old PHP/HTML
  sites) plus v8 (`current/` — the pre-rewrite Quasar portfolio, `_live/` —
  its last built output, and dead Docker/nginx self-hosting config). Nothing
  here is deployed; kept for git-history reference only.

## Conventions

- Per-app content lives in `src/data.ts` (or a typed dataset) as the single
  source of truth, except pvm-rpg (live Sheet fetch instead).
- Each app defines its own Tailwind color palette on top of `packages/ui`'s
  shared preset; dark mode and i18n come from `packages/ui` composables.
- Each app builds with its own `base` path (`/`, `/pvm-rpg/`, `/rpg-tp/`) so
  assets resolve correctly when served from a GitHub Pages subpath.

## Build & deploy

- `pnpm build` → `vp run -F './apps/*' build`, builds every app.
- `pnpm pages:build` → build + `scripts/assemble-pages.mjs`, merging each
  app's `dist/` into one `dist-pages/` (portfolio at the root, others under
  their own subfolder) — this is what `.github/workflows/deploy.yml`
  publishes to GitHub Pages on push to `main`.
- `vp check` (workspace-wide type-check/lint/format) must pass before commit.

## Known gotchas

- Tailwind v4's content scanner skips `node_modules` by default, including
  the pnpm-workspace symlink to `packages/ui` — fixed centrally via
  `@source '../';` in `packages/ui/src/tailwind/preset.css`. If a shared
  component's class silently doesn't apply anywhere, check the compiled CSS
  before assuming a logic bug.
- Don't source Tailwind classes from a runtime `colorVariants[key]` lookup
  object — Tailwind's scanner is unreliable on that shape. Use a plain
  hex/value lookup rendered via inline `:style` instead (see `GradeChip`,
  `FameChip`, `TeamBadge`).
- pvm-rpg's Google Sheet schema can drift from what the code assumes (grade
  strings, fame labels) — if data looks empty/wrong, check the live sheet's
  shape before assuming a code bug; `stores/sheet.ts` reads label→level
  mappings from the sheet's own reference columns at runtime for this reason.
- The old `pvm-rpg.champin.dev`/`rpg-tp.champin.dev` subdomains redirect via
  OVH's DNS Zone "Redirection" feature, which is **HTTP-only** — OVHcloud's
  own docs confirm the Control Panel cannot redirect `https://` without an
  attached hosting plan. This is an accepted platform limitation, not a bug
  to "fix" again; a Cloudflare migration is the candidate fix, still undecided.
- `vp`/`vite-plus` is a fast-moving beta — if `vp check` fails with a native-
  binding error, compare `vp --version` (global) against the local
  `vite-plus` version and run `vp upgrade`.
