# apps/

Each subfolder here is one independently built site, published under
`champin.dev/<slug>/` (the portfolio at `apps/portfolio` is the exception,
served at the domain root). All apps share the Vue + Tailwind component layer
in `packages/ui`.

## Convention

Every app owns, in its own `src/`:

- `data.ts` (or `.json`) — the single source of truth for that site's
  content, following the shape of the old
  `current/src/composables/data.ts`. Not every site has _static_ content —
  e.g. pvm-rpg's data is live-fetched from a Google Sheet at runtime, so its
  "data file" is really the sheet URL/schema plus a store, not hand-written
  content.
- `theme.css` — that site's palette (`primary`, `secondary`, accents…), built
  on the shared Tailwind preset from `packages/ui/src/tailwind/preset.css`.

## Adding a new site

`vp create vite:application` inside `apps/`, then wire it into the shared
Tailwind preset and the deploy workflow (base path, nginx-free — GitHub Pages
only, see `PLAN.md` at the repo root).
