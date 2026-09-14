import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";
import { defineConfig } from "vite-plus";

export default defineConfig({
  base: "/",
  plugins: [vue(), tailwindcss()],
  lint: {
    options: {
      typeAware: true,
      typeCheck: true,
    },
  },
});
