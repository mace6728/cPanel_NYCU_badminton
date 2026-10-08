# Suggested Directory Structure

If user management, login, and permission checks are removed, the first version only needs to keep the site pages, article features, and shared base code:

```text
project/
├── config/
│   ├── app.php
│   └── db.php
├── src/
│   ├── Database.php
│   ├── Services/
│   │   └── ArticleService.php
│   └── Helpers/
│       ├── sanitize.php
│       └── response.php
├── public/
│   ├── index.php
│   ├── allposts.php
│   ├── contact.php
│   ├── gallery.php
│   ├── admin/
│   │   ├── administrator.php
│   │   ├── articleToDB.php
│   │   ├── articleUpdate.php
│   │   └── deleteArticle.php
│   └── assets/
│       ├── css/
│       ├── js/
│       ├── fonts/
│       └── img/
├── templates/
│   ├── partials/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── navbar.php
│   └── pages/
│       ├── home.php
│       └── articles.php
├── tests/
├── .env.example
├── composer.json
└── README.md
```

`vendor/` is generated when Composer installs dependencies; it doesn't need to be created manually or committed to version control.

## Adjustment Principles

### Removing User and Auth Features

- Don't create `UserService.php`, `AuthService.php`, or `Auth.php`.
- Only remove the login, registration, and logout pages — and any endpoints/templates that exist solely to serve account review — once account features are confirmed to be permanently gone.
- Don't create empty Services just to preserve the original layering; keep only the article and shared functionality that's still actually used.

### Keeping Article and Database Responsibilities

- `config/db.php` centralizes database configuration; keep sensitive values in environment variables, not in code or a committed `.env`.
- `src/Database.php` is responsible for creating the PDO connection.
- `src/Services/ArticleService.php` centralizes reading, creating, updating, and deleting articles.
- `src/Helpers/` holds input handling and response utilities shared across pages, not page-specific business logic. **Done**: `sanitize.php` (POST field reads, the rich-text base64 decode, the time-or-now fallback) and `response.php` (JSON/HTML headers, success/fail/error output) now back `public/admin/{articleToDB,articleUpdate,deleteArticle,edit_heading,edit_date,edit_text}.php` and `public/api/event.php` — see MAINTENANCE_LOG.md. Deliberately introduces no new escaping/validation that wasn't already there.

### Admin-Side Security

After removing site login authentication, the admin pages and write endpoints under `public/admin/` could become callable by anyone. **Resolved**: `public/admin/.htaccess` already enforces HTTP Basic Authentication (`AuthUserFile "/home/badadmin/.htpasswds/public_html/admin/passwd"`, set up via cPanel's password-protect-directory feature) — don't remove this without setting up an equivalent restriction first.

## cPanel Migration — complete

The site now uses the `config/`/`src/`/`templates/`/`public/` layout above. `public/` is the document root (deployed to `/home/badadmin/public_html/`); `config/`, `src/`, and `templates/` deploy separately to `/home/badadmin/` (siblings of `public_html`, not web-reachable) — see README.md's Deployment Notes and MAINTENANCE_LOG.md for the full history of how this happened in stages:

1. Root-level pages renamed `.html` → `.php` to use `<?php require ?>` partials (old `.html` URLs confirmed safe to stop resolving — no redirect needed).
2. `gallery/*.html` (56 files) migrated onto the same shared partials.
3. Deployment pipeline audited end to end (the `.env`-deletion risk, and dead image references, both fixed).
4. Public entry point moved to `public/`, with `config/`/`src/`/`templates/` deployed outside the web root instead of alongside it.

**Operational note for the next deploy**: `.env` (and `config/db.local.php`, if still used) must live at `/home/badadmin/.env` (the account home directory), not inside `public_html` — this changed with step 4. Confirm it's been placed there before relying on a fresh deploy.

## Remaining from the original suggested tree

`composer.json` (done), `src/Helpers/` (done), and `tests/` (done — `tests/Unit/` with PHPUnit, alongside the pre-existing, unrelated `tests/legacy/`) are all in place now. Still not present, and not currently planned: `config/app.php`, `templates/pages/` (the site doesn't use a page/view split — each `public/*.php` page is still self-contained), and `public/assets/` (css/js/fonts/img stayed directly under `public/` rather than nested, to keep existing asset URLs unchanged).
