import { createRouter, createWebHashHistory } from "vue-router";

export const Paths = {
  HOME: "/",
  PLAYERS: "/joueurs",
  ORGA: "/orga",
  STATS: "/stats",
} as const;

export function playerPath(id: string): string {
  return `${Paths.PLAYERS}/${id}`;
}

export function teamPath(id: string): string {
  return `/equipes/${id}`;
}

const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  scrollBehavior: () => ({ left: 0, top: 0 }),
  routes: [
    { path: Paths.HOME, name: "home", component: () => import("./pages/HomeView.vue") },
    { path: Paths.PLAYERS, name: "players", component: () => import("./pages/PlayersView.vue") },
    {
      path: `${Paths.PLAYERS}/:id`,
      name: "player",
      component: () => import("./pages/PlayerView.vue"),
    },
    { path: "/equipes/:id", name: "team", component: () => import("./pages/TeamView.vue") },
    { path: Paths.STATS, name: "stats", component: () => import("./pages/StatsView.vue") },
    { path: Paths.ORGA, name: "orga", component: () => import("./pages/OrgaView.vue") },
  ],
});

export default router;
