/**
 * Builds a URL to a `public/` asset that respects the app's base path
 * (`/pvm-rpg/` in production). Plain `/images/x.png`-style strings in
 * templates don't get base-rewritten by Vite outside index.html.
 */
export function publicUrl(path: string): string {
  return `${import.meta.env.BASE_URL}${path.replace(/^\//, "")}`;
}
