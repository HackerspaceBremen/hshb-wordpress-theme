import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import laravel from "laravel-vite-plugin";
import { wordpressPlugin, wordpressThemeJson } from "@roots/vite-plugin";

export default defineConfig({
  base: "/app/themes/hshb-sage/public/build/",
  plugins: [
    tailwindcss(),
    laravel({
      input: [
        "resources/css/app.css",
        "resources/js/app.js",
        "resources/css/editor.css",
        "resources/js/editor.js",
        "resources/js/theme.js",
      ],
      refresh: true,
    }),

    wordpressPlugin(),

    // Generate the theme.json file in the public/build/assets directory
    // based on the Tailwind config and the theme.json file from base theme folder
    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
    }),
  ],
  resolve: {
    alias: {
      "@scripts": "/resources/js",
      "@styles": "/resources/css",
      "@fonts": "/resources/fonts",
      "@images": "/resources/images",
    },
  },
});
