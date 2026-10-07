# Maintenance Log

A running record of the cleanup/hardening pass on this repo, in order, so the
reasoning behind each change doesn't get lost. Newest entries at the bottom.

## 2026-10-06 — Repo tidy-up ([fbb5c38](../../commit/fbb5c38))

- Added `.gitignore` for `error_log`. 16 PHP error logs (one 2.6MB) were
  tracked in git and getting shipped to production on every deploy.
- Removed `ori-404.shtml` (unreferenced old backup of the 404 page).
- Removed `admin/測試用/` — three unreferenced duplicate admin scripts.
- Removed stale `.well-known/acme-challenge/` and `.well-known/pki-validation/`
  files — old Let's Encrypt/SSL validation artifacts that cPanel's AutoSSL
  regenerates on its own; didn't need to live in git.

## 2026-10-06 — Fixed fatal errors found by reading error_log ([f5c8e35](../../commit/f5c8e35))

Before deleting the error logs, read through them and found two live bugs:

- `api/event.php`: `if(!empty(sql))` referenced an undefined bare PHP
  constant `sql` instead of the `$sth` statement variable — fatal error
  on every request with an `id` param (PHP 8 treats undefined constants
  as fatal, not a warning). Fixed to check `$sth`.
- `admin/articleToDB.php`: `$_POST['time'] ?? date(...)` only falls back
  when the key is missing/null, not when it's an empty string — leaving
  the date field blank in the admin "新增文章" form sent `''` to MySQL and
  threw a PDOException. Fixed to fall back on empty values too.

(A third warning in the log, from `whoYouAre.php` reading
`$_SESSION['user']`, turned out to already be fixed — see below.)

## 2026-10-06 — Translated README.md and AGENT.md to English ([b0ad92d](../../commit/b0ad92d))

No content changes, just language.

## 2026-10-06 — Removed dead auth/registration code ([7d4105b](../../commit/7d4105b))

A prior commit (`421ba68`, before this log started) disabled login by
replacing `whoYouAre.php`'s `echo $_SESSION['user']` with `echo '';`, but
left the rest of the registration/approval system in place with nothing
pointing at it anymore:

- Deleted `login.php` (already a stub saying "登入功能已停用"), `logOut.php`,
  `register.html`, `whoYouAre.php` — confirmed nothing referenced any of them.
- Removed the "審核會員" (member approval) tab from `admin/administrator.php`
  — it only existed to approve signups from `register.html`, which was gone.
  Removed its DB query and the `doIt()`/`denyIt()` JS handlers.
- Deleted `admin/register2.php`, `admin/check2one.php` (the endpoints that
  tab called), and `Check/check.php` (an older unreferenced standalone
  duplicate of the same approval feature).
- Fixed `css/administrator.min.css`: the removed "審核會員" tab had been the
  *only* one of the four admin tabs not hidden by default — with it gone,
  made `#post` ("發表文章") the default-visible tab so the admin page
  doesn't load blank.
- Cleaned up the now-stale `register.html` entry in `sitemap.xml` and the
  `Check/` mention in `README.md`.

## 2026-10-06 — Centralized DB credentials ([f8a898a](../../commit/f8a898a))

Found the MySQL password hardcoded in plaintext across 10 files
(`api/DB.php`, `index.php`, `allposts.php` ×5, and five `admin/*.php`
files) — all committed to git history.

- Added `config/db.php`: the one place that builds the PDO connection,
  reading `DB_SERVER`/`DB_NAME`/`DB_USER`/`DB_PASSWORD` from environment
  variables, falling back to a gitignored `config/db.local.php` (template
  at `config/db.local.php.example`) for hosts that can't set real env vars.
- Every file that used to open its own connection now just
  `require`s `config/db.php`.
- While migrating `admin/edit_date.php`, `edit_heading.php`, and
  `edit_text.php`, found they were calling `mysql_pconnect()`/`mysql_query()`
  — functions removed from PHP entirely since PHP 7. The server runs PHP
  8.4, so these calls fatally crashed every time (confirmed via repeated
  `Call to undefined function mysql_pconnect()` entries in `admin/error_log`
  — turned out those entries were actually from a **different, untracked**
  `public_html/test.php` on the live server, not from these admin files,
  but the admin files had the identical bug and would have crashed too).
  Migrated all three to PDO and parameterized the query, which had been
  concatenating `$_POST['select_op']` directly into SQL (a SQL injection
  hole).
- **This did not rotate the actual MySQL password** — the old one remains
  in git history regardless of removing it from current files. Rotating
  the password on the cPanel/MySQL side, and creating the real
  `config/db.local.php` on the server, was left as a manual follow-up.
  → **Done by the user on 2026-10-07**: password rotated, `config/db.local.php`
  created on the server with the new credentials, site confirmed working.

## 2026-10-07 — Found: deploy pipeline never deleted removed files

`.cpanel.yml` used `cp -R * $DEPLOYPATH`, which only copies/overwrites —
it has no concept of removing a destination file whose source was deleted.
Every file ever deployed (including everything removed above, in its own
deploys over the years) stayed on the server forever. This is also how an
orphaned `public_html/test.php` — not in this repo at all, containing the
same old hardcoded credentials and the same removed `mysql_pconnect()`
call, hit ~127 times by bots since March 2023 — had survived undetected.

### Fix ([8139bdd](../../commit/8139bdd))

Switched to `rsync -a --delete`, which mirrors the repo exactly —
anything missing from the repo gets removed from the destination too.
Added two excludes for things that must persist on the server but
deliberately aren't (and shouldn't be) in git:
- `config/db.local.php` — the real DB credentials.
- `.well-known/` — cPanel's AutoSSL writes certificate-validation files
  here directly, on its own schedule, outside of any git deploy.

**Verified 2026-10-07**: deploy succeeded, `rsync` is available on the
host, and the orphaned `public_html/test.php` was automatically removed
by `--delete` with no manual cleanup needed.

## 2026-10-07 — Second sweep: more duplicate dead files

Searching for every `*.php` file in the repo (not just the ones the error
log pointed at) turned up more copies of the same already-fixed dead files,
missed because the earlier cleanup only checked the root:

- Removed 11 copies of `whoYouAre.php` under `gallery/` and its
  subdirectories (`DrPro`, `chintsao`, `cmu`, `fengyuan`, `friendly`,
  `jinzhu`, `ncku`, `ncue`, `university`, `wind`) — byte-identical to the
  root one, still had the **unfixed** `echo $_SESSION['user']` (the
  auth-removal commit only patched the root copy), and confirmed
  unreferenced from anywhere.
- Removed `js/logOut.php`, a duplicate of the root `logOut.php` already
  deleted — also unreferenced.
- Removed `js/administrator.min.js`, a stale/broken build artifact
  (starts with `alert("nop")`) not loaded by any page.
- Removed 9 tracked `.DS_Store` files (macOS Finder metadata, pure
  noise) and added `.DS_Store` to `.gitignore`.

### Open item found: two diverging contact-form handlers

`contact.html`'s contact form had **two different, diverging handlers**
both live at once:
- The plain HTML `<form action="mail/contact_me.php">` (fires if JS
  doesn't intercept the submit).
- `js/contact_me.min.js`'s AJAX handler, which on successful client-side
  validation calls `preventDefault()` and posts to `../contact_me.php`
  (the root one) instead.

The two backend scripts sent to different recipients with different
wording (`mail/contact_me.php` → one address with a generic sender;
root `contact_me.php` → two addresses, `nctubadadm@gmail.com` and
`deed515@msn.com`, using the real sender address). Which one actually
fired depended on whether JavaScript loaded and validated successfully —
meaning contact form submissions were silently going to different
inboxes depending on the visitor's browser/JS state.

**Resolved 2026-10-07** — see below.

## 2026-10-07 — Removed the contact form entirely

Decided a self-hosted `mail()`-based PHP form wasn't worth maintaining
for this site's volume: poor email deliverability compared to a real
SMTP/transactional service, public-facing attack surface (header
injection risk via unsanitized fields in `mail()` headers), and it had
been silently sending to inconsistent recipients (see above) without
anyone noticing. Replaced it with a plain `mailto:` link, the lowest-
maintenance option — no backend, nothing to go stale.

- `contact.html`: removed the `<form id="contactForm">` block and the
  `<script src="js/contact_me.min.js">` tag; replaced the form with the
  existing "contact us" sentence, now linking `nctubadadm@gmail.com` as
  a `mailto:` link. Kept the rest of the page (nav, header, footer,
  `css/reg.min.css` — confirmed that stylesheet is the whole Clean Blog
  theme's base styles, not form-specific, so it stays).
- Deleted `contact_me.php`, `mail/contact_me.php`, and
  `js/contact_me.min.js`. Confirmed no other page references any of the
  three (some unrelated bundled vendor JS — `js/gallery.min.js`,
  `js/clean-blog.js` — contains an inert copy of the same theme's
  default contact-form snippet, but no other page has the matching
  `#contactForm`/`#name`/`#email` elements for it to bind to, so it's
  dead weight already baked into those bundles and out of scope here).

## 2026-10-07 — Started the AGENT.md restructuring: src/Database.php + ArticleService

Per AGENT.md's own phasing ("logical layering first — config/, src/,
templates/ — without touching public paths"), started on `src/`. Scope
for this pass: the database layer and the article CRUD logic. Left
`templates/partials/` and the `public/` move for a separate pass, since
those touch the site's mostly-static `.html` pages and their URLs —
exactly what AGENT.md says to defer until URL rewrites are confirmed.

- Added `src/Database.php`: a tiny `Database::connect()` that builds the
  PDO connection (moved out of `config/db.php`, which now just resolves
  credentials and calls it).
- Added `src/Services/ArticleService.php`: centralizes every article
  query (`getAll`, `getLatest`, `getByCategory`, `getByTimer`,
  `getAllOrderedByTimer`, `create`, `update`, `delete`). Rewired all ~13
  call sites that used to run their own `SELECT`/`INSERT`/`UPDATE`/
  `DELETE` against the `article` table: `index.php`, `allposts.php` (its
  5 near-identical blocks), `admin/administrator.php` (×2),
  `admin/articleToDB.php`, `articleUpdate.php`, `deleteArticle.php`,
  `edit_date/heading/text.php` (×3), and `api/event.php`.
- Didn't add `src/Helpers/sanitize.php`/`response.php` from AGENT.md's
  suggested layout — found no concrete duplicated logic worth
  extracting yet (each endpoint's input handling differs enough that a
  shared helper would be speculative, not a real consolidation).

### Found and fixed along the way

1. **A live regression from the 2026-10-06 credentials-centralization
   commit.** `config/db.php` sets `PDO::ATTR_DEFAULT_FETCH_MODE =>
   PDO::FETCH_ASSOC`. Three call sites — `index.php`, `allposts.php`,
   and the delete-table listing in `admin/administrator.php` — read
   article rows positionally (`$row[0]`, `$row[1]`, …), which only
   worked under the *old* per-file connections' default fetch mode
   (`PDO::FETCH_BOTH`, since none of them passed an options array).
   After centralizing onto the shared `FETCH_ASSOC`-only connection,
   these three pages were silently rendering blank article
   text/dates/categories in production (a PHP warning in the error log,
   not a fatal error, so nothing crashed — just empty output). Fixed by
   switching every call site to the service's associative-array rows.
2. The same empty-string date bug fixed in `admin/articleToDB.php` on
   2026-10-06 (`$_POST['time'] ?? date(...)` not catching an empty
   string) was also present, unfixed, in `admin/articleUpdate.php` —
   fixed there too.
3. The admin delete-table listing orders by `timer DESC` while every
   other article listing orders by `date DESC` — preserved as a
   distinct `getAllOrderedByTimer()` method rather than silently
   unifying the two and changing that page's sort order.

Verified every touched file with `php -l`, and ran `ArticleService`
through a smoke test against an in-memory SQLite database (same PDO
interface, no real MySQL needed) exercising every method — all passed.
