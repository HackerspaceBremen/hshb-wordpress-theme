# hshb-sage

A WordPress Theme for the [Hackerspace Bremen e.V.](https://www.hackerspace-bremen.de) based on [Sage](https://roots.io/sage/).

## Build

```
$ composer install --no-dev --optimize-autoloader
$ npm install
$ npm run build
```

Then upload everything except `node_modules/`/`.git`/`.github` to WordPress (see [documentation](https://roots.io/sage/docs/deployment/)). You can also use prebuilt versions from the GitHub Releases or Action runs.
