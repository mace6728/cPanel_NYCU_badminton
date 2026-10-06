# NYCU Badminton Website

This project is a traditional PHP website deployed via cPanel. The project root doubles as the public document root, and many pages and assets link to each other using root-relative paths, so the public entry points stay at the root for now to avoid breaking existing URLs.

## Directory Layout

- Root: public pages, PHP entry points, the 404 page, sitemap, and search-engine verification files. These files' root paths may be existing public URLs, so plan a URL rewrite or compatible redirect before moving them.
- `admin/`: site administration features.
- `api/`: API and database connection code.
- `css/`, `js/`, `fonts/`: frontend styles, JavaScript, and fonts.
- `img/`, `gallery/`: site images and gallery content.
- `404/`: assets and scripts for the custom error page.
- `tests/legacy/`: old test and demo pages not referenced by the live site; this directory is blocked from web access by `.htaccess`.
- `tinymce/`: TinyMCE editor files bundled with the project.
- `cgi-bin/`, `less/`, `mail/`: existing special-purpose or tooling directories.

## Deployment Notes

`.cpanel.yml` recursively copies the project contents to the cPanel site directory. When adding private or development-only files, put them in a directory with restricted access, and confirm the web access rules still hold after deployment. Live pages and in-use downloadable files stay at their original paths to preserve existing links.
