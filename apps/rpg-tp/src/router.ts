import { createRouter, createWebHashHistory } from "vue-router";

export const Paths = {
  HOME: "/",
  PLAYERS: "/joueurs",
  ORGA: "/orga",
} as const;

const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  scrollBehavior: () => ({ left: 0, top: 0 }),
  routes: [
    { path: Paths.HOME, name: "home", component: () => import("./pages/HomeView.vue") },
    { path: Paths.PLAYERS, name: "players", component: () => import("./pages/PlayersView.vue") },
    { path: Paths.ORGA, name: "orga", component: () => import("./pages/OrgaView.vue") },
  ],
});

export default router;
