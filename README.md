# NYCU Badminton Website

This project is a traditional PHP website deployed via cPanel. `public/` is the document root; `config/`, `src/`, and `templates/` sit outside it and are deployed to the cPanel account's home directory instead, so they're never web-reachable. Public pages and assets keep their existing paths under `public/` to avoid breaking existing URLs.

## Directory Layout

- `config/`, `src/`, `templates/`: database config, the `ArticleService`/`Database` classes, and the shared head/navbar/footer partials. Not deployed to the web root — see Deployment Notes.
- `database/`: `schema.sql` (fresh install) and `migrations/` (upgrade an existing database; read the header of each file before running). Not deployed.
- `public/`: the document root. Public pages, PHP entry points, the 404 page, sitemap, and search-engine verification files all live here, at the same paths they've always had.
  - `public/admin/`: site administration features.
  - `public/api/`: API endpoints called from the browser.
  - `public/css/`, `public/js/`, `public/fonts/`: frontend styles, JavaScript, and fonts.
  - `public/img/`: site images, including the photos of every album (one folder per album).
  - `public/gallery/`: one-line page files for the photo albums; see Photo Albums below.
  - `public/404/`: assets and scripts for the custom error page.
  - `public/tinymce/`: TinyMCE editor files bundled with the project.
- `bin/`: command-line maintenance tools (`bin/gallery.php`). Not deployed.
- `tests/legacy/`: old test and demo pages not referenced by the live site; outside `public/`, so not deployed to the web root at all.
- `cgi-bin/`, `less/`, `mail/`: existing special-purpose or tooling directories, not deployed.

## Photo Albums

Albums are driven by the folders on disk. `config/albums.php` lists the categories and albums (title, cover, folder); the photos are simply the image files in the album's folder, shown in natural filename order (`2.jpg` before `10.jpg`). Nothing lists individual photos, so a photo can't be forgotten or mistyped.

- **Add photos to an album:** copy them into its folder under `public/img/`. Run `php bin/gallery.php thumbs` to create thumbnails for them (needs PHP's GD extension; run it on your own machine and commit the result). Photos without a thumbnail still work; the page loads the full image.
- **Hide a photo:** add its file name to the album's `exclude` list in `config/albums.php` (an optional key; no album uses it right now). Without it, every image in the folder is shown, so delete the file or exclude it if it shouldn't be public.
- **Add an album:** add an entry to its category in `config/albums.php`, then run `php bin/gallery.php stubs` to create its one-line page file. A whole new category also needs a card cover and a `gallery/<slug>.php` stub (same command).
- **Check your work:** `php bin/gallery.php check`, or `vendor/bin/phpunit` (the registry test fails on a missing folder, cover or page file, a stale `exclude` name, or a page file with no registry entry).

Page files under `public/gallery/` are identical one-line stubs that load `templates/gallery/page.php`; which page to show comes from the file's own name, never from the request.

## Deployment Notes

`.cpanel.yml` runs two kinds of rsync: `public/` mirrors (with `--delete`) to `/home/badadmin/public_html/`, the web root; `config/`, `src/`, and `templates/` copy (without `--delete`, so nothing else in the account's home directory is touched) to `/home/badadmin/` directly, as siblings of `public_html`. Every `require __DIR__ . '/../...'` path in `public/` assumes that sibling layout.

**Database credentials** come from `config/db.local.php`, which is gitignored and excluded from the deploy rsync, so it survives deploys. On the server it must be at `/home/badadmin/config/db.local.php` (the account home, *not* inside `public_html`). Create it once by copying `config/db.local.php.example` and filling in the password. cPanel doesn't load `.env` files for PHP, so there is no `.env` support; real environment variables (`DB_PASSWORD`, `DB_SERVER`, `DB_NAME`, `DB_USER`) still take priority if your host provides them.
