# Common trunk for champin.dev sub-sites — migration complete

Historical record of the migration from three separate repos
(`my-website`/`current`, `pvm-rpg`, `rpg-tp`) into one shared monorepo trunk.
**Status: done and live at champin.dev.** For the current architecture and
day-to-day conventions, see `CLAUDE.md`.

## Status

- [x] Phase 1 — Scaffold the trunk (pnpm workspace `apps/*`/`packages/*`
      under Vite+/`vp`; `packages/ui` seeded with the shared Tailwind preset).
- [x] Phase 2 — Rewrite portfolio: Quasar → plain Vue 3 + Tailwind v4.
- [x] Phase 3 — Rewrite pvm-rpg: Quasar → plain Vue 3 + Pinia, keeping the
      live Google Sheet fetch. Fixed two dead features along the way (never
      actually wired up on the old live site): Wall-of-Fame computation and
      the language switcher.
- [x] Phase 4 — Rewrite rpg-tp: React → Vue 3, dropping `@headlessui/react`/
      `@heroicons/react` for native/hand-rolled equivalents.
- [x] Phase 5 — Wired the unified GitHub Pages deploy: one domain, one build,
      `scripts/assemble-pages.mjs` + `.github/workflows/deploy.yml`.
- [x] Phase 6 — Merged to `main`, pushed live at champin.dev.
- [x] Post-launch feature pass across all 3 apps: sort/search, error states +
      retry, player/team detail pages, stats page, cross-links between sites,
      OG/Twitter meta tags, sessionStorage cache for pvm-rpg's Sheet fetch.
      Old `pvm-rpg`/`rpg-tp` repos' GitHub Pages custom domains removed.
      `current/` and `_live/` archived into `_archive/v8/`.
- [~] Old-subdomain redirects (`pvm-rpg.champin.dev`, `rpg-tp.champin.dev`) —
  DNS now points them at OVH's DNS Zone "Redirection" feature, which
  turned out to be **HTTP-only** (confirmed against OVHcloud's own docs);
  no config fix exists within that feature. A Cloudflare migration (full
  nameserver move, free Universal SSL + Redirect Rules) is the leading
  candidate, still undecided — Bastien is hesitant given OVH also hosts
  mail + client-facing tech-contact duties on this domain. Not resolved
  as of this writing; revisit before deleting the old `pvm-rpg`/`rpg-tp`
  repos, since the redirect isn't fully working yet.

## Context

Three of Bastien's personal Trackmania/portfolio sites lived in three
separate repos, each with its own toolchain, theming approach, and GitHub
Pages deployment on its own subdomain. Goal: one repo — a "common trunk" —
so a new mini-site costs little to add, while each site keeps its own data
and visual identity in its own subfolder.

## Key decisions

1. All three sites rewritten from scratch, dropping Quasar (both sites) and
   React (rpg-tp) for plain Vue 3 + Vite+ + Tailwind v4. Tailwind loaded once
   at the trunk level (`packages/ui`); each app layers its own palette on top.
2. Hosting collapsed to one domain/one deploy: `champin.dev/<slug>/` instead
   of per-site subdomains. All Docker/nginx self-hosting dropped — GitHub
   Pages is the only deploy target now. Legacy `_archive/` PHP versions not
   carried into the new trunk.
3. `my-website` reused in place (kept git history) on a feature branch,
   merged to `main` once verified stable.

Real cost: this wasn't a repo reshuffle — it was a full UI rewrite of all
three sites plus new deploy plumbing. That was the bulk of the effort, not
the monorepo scaffolding itself.
