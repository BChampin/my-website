/**
 * Builds a URL to a `public/` asset that respects the app's base path
 * (`/rpg-tp/` in production). Plain `/images/x.png`-style strings in
 * templates don't get base-rewritten by Vite outside index.html.
 */
export function publicUrl(path: string): string {
  return `${import.meta.env.BASE_URL}${path.replace(/^\//, "")}`;
}

/** URL of a player's portrait, shared by every place that renders one. */
export function playerImageUrl(playerId: string): string {
  return publicUrl(`players/player_${playerId}.png`);
}
