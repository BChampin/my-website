# Common trunk for champin.dev sub-sites

Working branch: `trunk-monorepo`. Merges to `main` only once the new trunk
reaches a stable, feature-complete state — `main` keeps serving the current
live site untouched until then. Go-ahead is required between phases below.

## Status

- [x] **Phase 1 — Scaffold the trunk.** Root pnpm workspace (`apps/*`,
      `packages/*`) wired up under Vite+ (`vp install` / `vp check` pass
      cleanly). `packages/ui` scaffolded with the shared Tailwind
      design-token preset (`src/tailwind/preset.css`), empty
      components/composables convention documented in its `README.md`.
      `apps/` is empty, ready for phase 2. Legacy content (`_archive/`,
      `_live/`, `current/`, `extension/`, `nginx/`, `docker-compose.yml`,
      root `README.md`) intentionally excluded from the new tooling via
      `.prettierignore`/`.eslintignore` and left untouched.
- [ ] Phase 2 — Rewrite portfolio
- [ ] Phase 3 — Rewrite pvm-rpg
- [ ] Phase 4 — Rewrite rpg-tp
- [ ] Phase 5 — Wire the unified GitHub Pages deploy
- [ ] Phase 6 — Merge to `main`

## Context

Three of Bastien's personal Trackmania/portfolio sites currently live in three
separate repos (`my-website`, `rpg-tp`, `pvm-rpg`), each with its own toolchain,
its own theming approach, and its own GitHub Pages deployment on its own
subdomain. Adding a new mini-site today means bootstrapping a whole new repo
from scratch. The goal is a single repo — a "common trunk" — that new sites can
be added to cheaply, while each site keeps its own data and visual identity in
its own subfolder (mirroring the `data.ts` pattern already used in
`current/src/composables/data.ts`).

## What's actually there today

| Repo                      | Stack                                              | Data                                                                                                                                                                 | Hosting today                                                                                                                                                                                                                                                                                     |
| ------------------------- | -------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `my-website` (`current/`) | Quasar CLI v1 + Vue 3, JS/TS `data.ts`             | Static, hand-written in `composables/data.ts`                                                                                                                        | **GitHub Pages**, custom domain `champin.dev` (classic/branch-based deploy — no `.github/workflows` in the repo, unlike the other two). The repo's `docker-compose.yml`/`nginx/` setup is unrelated infra for the `*.my.champin.dev` subdomain, self-hosted on Bastien's NAS — out of scope here. |
| `pvm-rpg`                 | Quasar CLI v2 + Vue 3 + Pinia                      | **Live-fetched** at runtime from a public Google Sheet (`stores/sheet.ts`), no static content file                                                                   | GitHub Actions → GitHub Pages, custom domain via `CNAME` (`pvm-rpg.champin.dev`)                                                                                                                                                                                                                  |
| `rpg-tp`                  | Plain Vite + **React** 19 + Tailwind v4 (not Vue!) | Static JSON fetched from `/json/rpg_tp.json`, plus a CSS-custom-property theme (`--theme-1..8`) with dark-mode overrides, mapped into Tailwind via an `@theme` block | GitHub Actions → GitHub Pages, custom domain via `CNAME` (`rpg-tp.champin.dev`)                                                                                                                                                                                                                   |

rpg-tp's visual identity was deliberately derived from the Wingobear
streamer's site to match an existing graphic chart — the original source
repo wasn't found (searched `rpg-tp` for "xAtomz"/"Atom"/"wingobear", no
hits), so that lineage is currently untraceable from the code alone.

`vite+` (viteplus.dev / `vp`) is a **unified toolchain CLI**, not a
meta-framework or multi-tenant site generator: it wraps Vite (dev/build),
Vitest, Oxlint/Oxfmt, tsgo and **Vite Task** (`vp run`, a Turborepo-style task
runner with caching and workspace-aware execution). It explicitly supports
growing **monorepos** (`vp create vite:monorepo`, `vp create vite:application`
to add an app inside an existing workspace, `vp migrate` to bring an existing
project under its management) — a good fit for "one repo, N independently
buildable sites."

## Decisions

1. **All three sites get rewritten from scratch on the new trunk**, ditching
   Quasar entirely (and rpg-tp's React) in favor of **plain Vue 3 + Vite+ +
   Tailwind**. Tailwind is loaded once at the trunk level (shared config/
   preset in `packages/ui`); each app defines its **own** Tailwind color
   palette (`primary`, `secondary`, …) on top of that shared preset. rpg-tp's
   existing CSS-var-driven `@theme` pattern is the natural template for how a
   site's palette plugs into the shared Tailwind setup.
2. **Hosting collapses to one domain, one deploy**: every site is served from
   `champin.dev/<slug>/` (e.g. `champin.dev/pvm-rpg/`, `champin.dev/rpg-tp/`)
   instead of per-site subdomains — one GitHub Pages site, one `CNAME`
   (`champin.dev`), one build. **All nginx/Docker self-hosting is dropped
   from the new version** — GitHub Pages is the only deploy target going
   forward. The legacy `_archive/` PHP versions are **not carried into the
   new trunk** — dropped for now (can be resurrected from git history later
   if ever needed).
3. **Reuse and restructure `my-website` in place** (keep git history) on this
   dedicated feature branch.
4. `apps/` convention (see layout below).

**Real cost**: this isn't a repo reshuffle, it's a full UI rewrite of all
three sites (Quasar dropped from two, React→Vue for the third) plus new
deploy plumbing. That's the bulk of the implementation effort, not the
monorepo scaffolding.

## Proposed repo layout

```
my-website/
├── apps/
│   ├── portfolio/     # rewrite of current/, served at champin.dev/
│   ├── pvm-rpg/        # rewrite of pvm-rpg, served at champin.dev/pvm-rpg/
│   ├── rpg-tp/         # rewrite React→Vue, served at champin.dev/rpg-tp/
│   └── <new-site>/     # `vp create vite:application` inside apps/ to add one
├── packages/
│   └── ui/             # shared Vue components, composables, Tailwind preset
│       ├── components/ # e.g. ThemeToggle, LangSwitch, layout shell, Card/Timeline
│       ├── composables/# useDarkMode, useLocalization, useLocalStorage, fetch helpers
│       └── tailwind/    # shared Tailwind config/preset + the CSS-var theme contract
├── .github/workflows/   # new: single Pages deploy workflow (none exists yet on main)
├── vite.config.ts        # root Vite+ workspace config (`run.tasks`, etc.)
└── package.json           # workspace root
```

Per-site convention:

- `apps/<site>/src/data.ts` (or `.json`) — same idea as today's
  `composables/data.ts`: the single source of truth for that site's content.
  **Note**: not every site has _static_ content — pvm-rpg's data is
  live-fetched from a Google Sheet at runtime, so its "data file" is really
  the Sheet URL/schema + Pinia store, not hand-written content. Keep that
  fetching logic (currently `stores/sheet.ts`) essentially as-is; it's
  UI-framework agnostic.
- `apps/<site>/src/tailwind-theme.css` (or `.ts`) — that site's palette
  (`primary`, `secondary`, accents…), consumed by the shared Tailwind preset
  and component layer in `packages/ui`, so every site gets dark-mode and
  consistent components for free without redefining them.

## Deploy model (GitHub Pages only)

- Each app is built with a Vite `base: '/pvm-rpg/'`-style config (and a
  matching Vue Router base) so assets resolve correctly when served from a
  subpath instead of a subdomain. Portfolio stays at `base: '/'`.
- `vp run build` (via `run.tasks` in the root `vite.config.ts`) builds every
  app in one pass; a staging step assembles each app's `dist/` into one
  publish directory (portfolio at the root, each other site under its own
  subfolder).
- A single new GitHub Actions workflow (mirroring the `upload-pages-artifact`
  - `deploy-pages` pattern already used by `rpg-tp`/`pvm-rpg`) publishes that
    assembled directory as the one Pages site for `champin.dev`.
- **Don't forget**: 301 redirects (or at minimum an informative landing page)
  from the old subdomains (`pvm-rpg.champin.dev`, `rpg-tp.champin.dev`) to the
  new paths, so existing links/bookmarks keep working, then tear down those
  two repos' Pages configs/CNAMEs. The `*.my.champin.dev` NAS setup is
  untouched/out of scope.

## Implementation phases

Go-ahead required between each phase.

1. **Scaffold the trunk**: restructure into the workspace layout above; bring
   it under Vite+ management (`vp migrate` or manual `package.json`
   workspaces + root `vite.config.ts`); empty `packages/ui` with the shared
   Tailwind preset.
2. **Rewrite portfolio**: `apps/portfolio`, plain Vue + Tailwind, reusing
   `data.ts` content almost unchanged; extract first shared components
   (dark-mode toggle, lang switch, card/timeline) into `packages/ui`.
3. **Rewrite pvm-rpg**: `apps/pvm-rpg` on `packages/ui` (map cards, medal/fame
   chips, player dialog), keep the Pinia/Sheet fetching logic.
4. **Rewrite rpg-tp**: React → Vue into `apps/rpg-tp`; its Tailwind + CSS-var
   theme becomes the seed of the shared Tailwind preset in `packages/ui`.
5. **Wire the unified GitHub Pages deploy**: base-path configs, the new
   Actions workflow, build-output staging, redirects from old subdomains.
6. **Merge to `main`** once verified stable; retire/archive `rpg-tp` and
   `pvm-rpg` as standalone repos.

## Known gotchas (tooling)

- The global `vp` CLI drifts from the local `vite-plus` package version
  quickly (this is a fast-moving beta). If `vp check`/`vp fmt`/`vp lint`
  fail with `error: Cannot find native binding...`, first check `vp --version`
  — if the "Local vite-plus" version differs from the global `vp` version,
  run `vp upgrade` and retry.
- Do **not** add a generic `vitest: npm:@voidzero-dev/vite-plus-test@latest`
  catalog/override entry until an app actually needs tests. At the time of
  writing, `@voidzero-dev/vite-plus-test@latest` resolves to `0.1.24`, which
  pulls in a stale nested copy of `@voidzero-dev/vite-plus-core@0.1.24`
  alongside the real `0.3.2` one — that duplicate is what triggers the
  native-binding error above. Add the catalog entry only when actually
  wiring up tests, and re-verify `vp check` still passes after.
- `vp fmt`/`vp lint` scan the whole repo by default (respecting
  `.gitignore`/`.prettierignore`/`.eslintignore`, not workspace boundaries).
  Legacy paths are excluded via root `.prettierignore`/`.eslintignore` —
  extend those when new non-trunk content shows up, rather than letting the
  formatter touch it.
- `vp env pin` was run once to pin Node `24.21.0` for this project
  (`.node-version`, committed) — the system Node here is v20, which doesn't
  satisfy `vite-plus`'s `engines.node: >=22.12.0`.

## Verification

- `vp run dev` per app renders correctly locally; a local static-server smoke
  test of the assembled publish directory confirms each site works under its
  `/slug/` subpath (no absolute-root asset 404s).
- `vp run build` produces working `dist/` output for every app.
- Manually click through each site's golden path (dark/light toggle, language
  switch where applicable, pvm-rpg's live Sheet fetch, rpg-tp's card/timeline
  views) using the assembled output before merging to `main`.
- Confirm the redirects from the two old subdomains land on the right new
  paths after DNS/Pages cutover.
