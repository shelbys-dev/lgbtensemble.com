# LGBT Ensemble - Theme WordPress
Theme officiel de `lgbtensemble.com`.

## Apercu
Ce repository contient un theme WordPress custom pour la communaute LGBTQIA+:
- design inclusif avec palette coloree et gradients
- navigation flottante responsive (desktop/mobile)
- page d'accueil dediee (`front-page.php`)
- styles globaux et page blog via Sass
- compatibilite Elementor (pages construites avec Elementor)

## Prerequis
- WordPress recent
- Plugin Elementor (recommande, voire necessaire pour les pages construites avec Elementor)
- Dart Sass (pour regenerer `style.css` depuis `sass/`)

## Installation du theme
1. Copier ce dossier dans `wp-content/themes/lgbt-ensemble`.
2. Activer le theme dans l'admin WordPress (`Apparence > Themes`).
3. Creer/assigner un menu a l'emplacement `Menu principal`.
4. Configurer une page d'accueil statique si necessaire (`Reglages > Lecture`).

## Workflow CSS (Sass -> style.css)
Le theme charge `style.css` (via `get_stylesheet_uri()` dans `functions.php`).
Le parametre de version de la feuille est genere automatiquement avec `filemtime(style.css)` pour forcer le refresh cache apres chaque recompilation.

Source principale Sass:
- `sass/index.scss`

Compilation manuelle:
```bash
sass sass/index.scss style.css --no-source-map --style=expanded
```

Mode watch:
```bash
sass --watch sass/index.scss:style.css --no-source-map --style=expanded
```

## Versioning des assets (cache-busting)
- Le CSS principal est enqueue avec une version basee sur la date de modification du fichier `style.css`.
- Concretement, l'URL devient `style.css?ver=<timestamp>`.
- A chaque recompilation Sass, `filemtime` change et les navigateurs/CDN recuperent la nouvelle version.
- En fallback (si fichier absent), la version du theme est utilisee.

## Structure principale
- `functions.php`: setup du theme, enregistrement menu, support thumbnails/HTML5, enqueue des styles avec versioning auto (filemtime), support Elementor.
- `header.php` / `footer.php`: layout global, navbar, footer et script toggle mobile.
- `front-page.php`: hero + mise en avant des derniers articles.
- `index.php`: template de liste des posts/archives.
- `page.php`: template de page generic compatible Elementor.
- `style.css`: feuille de style compilee + en-tete de declaration du theme.
- `sass/`: sources Sass (variables, styles globaux, composants, page blog).

## Notes
- Les metadonnees du theme (nom, version, text domain) sont definies dans `style.css`.
- Le dossier `.github/workflows/` contient des workflows CI herites qui peuvent ne pas refleter le process WordPress de ce theme.
- Utiliser idealement l'encodage UTF-8 sur les fichiers PHP/SCSS pour eviter les caracteres accentues corrompus.
