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
- `src/Helpers/` holds input handling and response utilities shared across pages, not page-specific business logic.

### Admin-Side Security

After removing site login authentication, the admin pages and write endpoints under `public/admin/` could become callable by anyone. If article management features are still needed, access restrictions (IP allowlist, HTTP Basic Authentication, etc.) must be set up via cPanel/Apache before deployment; otherwise the admin write features should be disabled or removed. Don't assume the admin side is protected just because the login page has been disabled.

## Incremental cPanel Migration

The site currently uses the project root as its public root, and existing URLs depend on the original file paths. So the `public/` layout above is the cleanup target, not something to move all pages and assets into at once. First clean up the database connection and article logic, then plan compatibility through the cPanel document root or URL rewrites, and migrate in batches while confirming old URLs still work.

The first phase can adopt the following logical layering without immediately changing the public paths:

```text
config/
src/
templates/
```

The header, footer, and navbar shared across pages can be gradually extracted into `templates/partials/`; only after confirming URL rewrites, asset paths, and the deployment process should moving the public entry point to `public/` be considered.
