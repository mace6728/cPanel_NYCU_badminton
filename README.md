# NYCU Badminton Website

This project is a traditional PHP website deployed via cPanel. `public/` is the document root; `config/`, `src/`, and `templates/` sit outside it and are deployed to the cPanel account's home directory instead, so they're never web-reachable. Public pages and assets keep their existing paths under `public/` to avoid breaking existing URLs.

## Directory Layout

- `config/`, `src/`, `templates/`: database config, the `ArticleService`/`Database` classes, and the shared head/navbar/footer partials. Not deployed to the web root — see Deployment Notes.
- `public/`: the document root. Public pages, PHP entry points, the 404 page, sitemap, and search-engine verification files all live here, at the same paths they've always had.
  - `public/admin/`: site administration features.
  - `public/api/`: API endpoints called from the browser.
  - `public/css/`, `public/js/`, `public/fonts/`: frontend styles, JavaScript, and fonts.
  - `public/img/`, `public/gallery/`: site images and gallery content.
  - `public/404/`: assets and scripts for the custom error page.
  - `public/tinymce/`: TinyMCE editor files bundled with the project.
- `tests/legacy/`: old test and demo pages not referenced by the live site; outside `public/`, so not deployed to the web root at all.
- `cgi-bin/`, `less/`, `mail/`: existing special-purpose or tooling directories, not deployed.

## Deployment Notes

`.cpanel.yml` runs two kinds of rsync: `public/` mirrors (with `--delete`) to `/home/badadmin/public_html/`, the web root; `config/`, `src/`, and `templates/` copy (without `--delete`, so nothing else in the account's home directory is touched) to `/home/badadmin/` directly, as siblings of `public_html`. Every `require __DIR__ . '/../...'` path in `public/` assumes that sibling layout.

**`.env` must live at `/home/badadmin/.env`** (the account home directory, *not* `public_html/.env`) for `config/db.php` to find it — this changed with the `public/` restructuring. Same for `config/db.local.php`, if still used as a fallback anywhere: it belongs at `/home/badadmin/config/db.local.php`.
