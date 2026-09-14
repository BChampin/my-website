import { createRouter, createWebHashHistory } from "vue-router";

const router = createRouter({
  history: createWebHashHistory(import.meta.env.BASE_URL),
  scrollBehavior: () => ({ left: 0, top: 0 }),
  routes: [
    { path: "/", name: "home", component: () => import("./pages/HomePage.vue") },
    { path: "/maps", name: "maps", component: () => import("./pages/MapsPage.vue") },
    { path: "/players", name: "players", component: () => import("./pages/PlayersPage.vue") },
    {
      path: "/:pathMatch(.*)*",
      name: "not-found",
      component: () => import("./pages/NotFoundPage.vue"),
    },
  ],
});

export default router;
