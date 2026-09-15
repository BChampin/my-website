#!/usr/bin/env node
// Assembles each app's already-built dist/ into one publish directory for a
// single GitHub Pages site: portfolio at the root (champin.dev/), every
// other site under its own subfolder (champin.dev/<slug>/), matching each
// app's own `base` in its vite.config.ts. Run `pnpm build` first.

import { cpSync, existsSync, mkdirSync, rmSync } from "node:fs";
import { fileURLToPath } from "node:url";
import path from "node:path";

const scriptDir = path.dirname(fileURLToPath(import.meta.url));
const root = path.join(scriptDir, "..");
const outDir = path.join(root, "dist-pages");

const sites = [
  { app: "portfolio", slug: "" },
  { app: "pvm-rpg", slug: "pvm-rpg" },
  { app: "rpg-tp", slug: "rpg-tp" },
];

rmSync(outDir, { recursive: true, force: true });
mkdirSync(outDir, { recursive: true });

for (const { app, slug } of sites) {
  const src = path.join(root, "apps", app, "dist");
  if (!existsSync(src)) {
    console.error(`Missing ${path.relative(root, src)} — run \`pnpm build\` first.`);
    process.exit(1);
  }
  const dest = slug ? path.join(outDir, slug) : outDir;
  mkdirSync(dest, { recursive: true });
  cpSync(src, dest, { recursive: true });
  console.log(`${app} -> ${path.relative(root, dest)}/`);
}

console.log(`Assembled ${sites.length} sites into ${path.relative(root, outDir)}/`);
