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

(Note: `getLatest()`'s `LIMIT` was subsequently hardened from a cast
int interpolated into the SQL string to a real bound parameter —
`LIMIT ?` with `bindValue(..., PDO::PARAM_INT)` — a cleaner way to
avoid string-building SQL at all, even though the interpolated version
was already injection-safe since the parameter is type-hinted `int`.)

## 2026-10-07 — Outage: rsync broke .htaccess permissions

The 2026-10-07 `.cpanel.yml` fix (switching `cp -R` to `rsync -a
--delete`) caused a live outage shortly after: the whole site started
returning "Forbidden ... Server unable to read htaccess file, denying
access to be safe."

**Root cause:** `rsync -a` includes `-p` (preserve permissions), which
copies the exact file mode from the *source* — the git checkout
`.cpanel.yml`'s deployment task runs from on the server — instead of
applying sane defaults. That checkout's permissions depend on whatever
umask the cPanel deploy process used, not on anything tracked in git
(git only records the executable bit, not the full mode). Once that
checkout's `.htaccess` lost its world-readable bit, `rsync -a` carried
that restrictive permission straight into the live `public_html/`, and
Apache's main process — which must read `.htaccess` directly,
independent of suexec/PHP-user — could no longer open it at all.

**Immediate fix:** manually `chmod 644` the live `.htaccess` (and the
other `.htaccess` files under `public_html/`) to restore the site.

**Permanent fix:** changed the rsync flags from `-a` to `-rt
--chmod=Du=rwx,Dg=rx,Do=rx,Fu=rw,Fg=r,Fo=r` — this drops permission/
owner/group preservation entirely and instead forces every directory
to `755` and every file to `644` on every deploy, regardless of
whatever mode the source checkout happens to have. Confirmed there are
no symlinks or scripts anywhere in the repo that actually need an
executable bit (the few files git shows as `100755`, all in `fonts/`
and `img/`, are just incidental from whoever first added them — images
and fonts don't need to be executable), so forcing everything to
`644`/`755` is safe.

### Follow-up: the outage persisted — `public_html` itself was `0700`

The `.cpanel.yml` fix above didn't immediately restore the site because
it only takes effect the next time the deployment tasks actually *run*
— pushing to GitHub doesn't trigger that by itself; cPanel's Git
Version Control deploys on a manual pull/deploy from its UI (or a
webhook, if one's configured), so the broken permissions from the
original `rsync -a` run were still sitting on the server untouched.

`namei -l` on the live `.htaccess` path showed the real extent of the
damage: `public_html` itself was `0700` (owner-only — no access for
group or others at all), not just `.htaccess`. That's a more
fundamental break than any single file's mode: at `700`, Apache can't
even traverse into the directory to look for `.htaccess`, regardless of
that file's own permission. This happened because `rsync -a src/ dest/`
also applies the source's top-level directory permissions onto `dest/`
itself (here, whatever the server-side git checkout's root directory
happened to be — again, dependent on that checkout's umask, not
anything git tracks).

**Fix:** `chmod 755 /home/badadmin/public_html` manually, plus
triggering a proper deploy of the latest commit from cPanel's UI so the
corrected `rsync --chmod` command actually runs and self-heals
permissions on `public_html` and everything under it going forward.

## 2026-10-07 — Added .env support

`config/db.php` already read `DB_SERVER`/`DB_NAME`/`DB_USER`/
`DB_PASSWORD` via `getenv()`, but PHP's `getenv()` only sees real
process environment variables — it doesn't parse a `.env` file on its
own, so `.env` wasn't actually usable before this without a loader.

- `config/db.php` now reads a gitignored `.env` at the repo root first
  (a small inline parser — `putenv()` for each `KEY=value` line, only
  if that key isn't already set by a real environment variable), before
  falling back to `config/db.local.php` as before. Priority order is
  now: real env vars → `.env` → `config/db.local.php`.
- Added `.env` (gitignored, real credentials — same values as the
  existing `config/db.local.php`) and `.env.example` (tracked template,
  matching the pattern already used for `db.local.php.example`).
- `config/db.local.php` stays in place as a further fallback; it's
  dormant now that `.env` supplies the same values first, but harmless
  to keep for hosts/setups that don't use `.env`.

Verified the parser against the real `.env` file directly (not just
`php -l`) — confirms the password's special characters (`%`, `!`)
round-trip correctly through `putenv()`/`getenv()`.

## 2026-10-07 — Extracted templates/partials/{head,navbar,footer}.php for the root pages

Continuing AGENT.md's layering phase: the 20 root-level pages (18
previously `.html`, plus `index.php`/`allposts.php`) all copy-pasted
the same ~100-line `<head>`/navbar boilerplate and the same footer —
confirmed via survey that none of them used PHP includes anywhere, it
was pure duplication. `admin/administrator.php` is a different theme
entirely (Material Design Lite, no public nav/footer) and was left
alone; `gallery/*.html` subpages are a separate, larger batch, still
deferred and still `.html`.

Doing this required deciding how `<?php require ?>` partials could
work on pages that were `.html`. Updated AGENT.md's phasing to drop
the "don't touch public paths yet" restriction for this one case:
root pages are renamed `.html` → `.php`, and old `.html` URLs are
allowed to 404 (no redirect layer — confirmed acceptable).

- Added `templates/partials/head.php` (doctype through `<body>`,
  parameterized by `$pageTitle`/`$pageDescription`/`$pageCss`/
  `$pageKeywords`/`$extraHead`/`$bootstrapCss`), `navbar.php`
  (parameterized by `$activePage`, which page's own nav link renders
  as `href="#"` instead of a live link — matching the pre-existing
  behavior of disabling the self-link), and `footer.php` (footer +
  closing scripts/tags, parameterized by `$extraScripts`).
- Converted all 18 root `.html` pages to `.php` (`git mv` + rewired
  head/nav/footer to the partials), and switched `index.php` and
  `allposts.php` (already `.php`) onto the same partials.
- `intro_member.php` needed `$bootstrapCss = 'bootstrap4.min.css'` —
  it was the one page using `bootstrap4.min.css` instead of
  `bootstrap.min.css`; the partial supports this as an override.
- `competition.php` and `normalCompetition.php` keep their
  page-specific `<style>` block and inline `.seeWhole` toggle
  `<script>` via `$extraHead`/`$extraScripts` (captured with
  `ob_start()`/`ob_get_clean()`). `allposts.php` and `index.php` keep
  their own inline `<script>` blocks the same way.
- Deleted the root-level `university_cup.html` — confirmed orphaned:
  not linked from any nav or page, not in `sitemap.xml`, and its own
  asset links used `../img/...`/`../css/...` (relative paths that
  would point *above* the webroot from the actual root, i.e. already
  broken). The real, linked gallery page is `gallery/university_cup.html`.
- Unifying the footer fixed two pre-existing inconsistencies without
  extra effort: the stale `zh-tw.facebook.com` link on `index.php`/
  `allposts.php`/`JinZhuRecord.php` now matches the newer
  `www.facebook.com/p/...` link every other page used, and
  `JinZhuRecord.php`'s footer (previously minified with a broken empty
  `<li></li>` where the Facebook link should have been, plus a stray
  unbalanced `</div>` before `</body>`) now renders the same footer as
  every other page.
- Fixed a malformed `<meta name="keywords" ...>` tag in `index.php`
  that was missing its closing `>` (merged into the next meta tag) —
  carried over as `$pageKeywords` on `head.php`.
- Updated `sitemap.xml`'s `<loc>` entries for the 17 renamed pages it
  referenced (`al_President.php` wasn't listed there to begin with).
  Left the sitemap's domain (`badminton.nctu.edu.tw`, already stale
  pre-existing) untouched — out of scope here.
- Found and fixed one stray cross-link the nav-only search missed:
  `index.php`'s body content linked `al_announcement.html` directly
  (not through the nav) — updated to `al_announcement.php`.

Verified every touched file with `php -l`, then ran the whole site
through PHP's built-in server: all 18 converted pages return 200 with
no warnings/errors, exactly one `href="#"` each (confirming the
active-page nav-disabling logic works), the right page-specific CSS
loads (including `intro_member.php`'s `bootstrap4.min.css`), and old
`.html` URLs now 404 as expected (no redirect was set up). Also
confirmed `competition.php`'s/`normalCompetition.php`'s inline
style/script survived the refactor intact.
`index.php`/`allposts.php` hit a fatal error in local testing
(`mb_internal_encoding()` undefined) — that's the local sandbox's PHP
missing the `mbstring` extension that `config/db.php` has always
required, unrelated to this change; the head/nav rendered correctly
before that point.

## 2026-10-08 — Fixed the "隊長介紹" nav submenu doing nothing on mobile/narrow screens

Reported: clicking a nav item whose own dropdown contains a further
nested dropdown (`關於球隊` → `隊長介紹` → `男隊長`/`女隊長`) appeared to
do nothing.

Root cause, found by driving the live nav with Playwright at both
desktop and mobile widths and diffing computed styles across pages:
every page's own CSS has a rule meant to be scoped to
`.is-fixed .nav>li>ul>li>ul{position:absolute;left:110px;top:180px}`
(the desktop-only hardcoded coordinates for the third-level dropdown,
only meant to apply once the sticky-on-scroll `.is-fixed` state is
active) — but in `css/team.min.css` and `css/coach.min.css` the
`.is-fixed` prefix was missing, so the absolute positioning applied
*unconditionally*, overriding the responsive `@media (max-width:914px)`
rule that otherwise makes the mobile collapsed nav stack normally.
The submenu was still technically "opening" (class toggled, `display:
block`), just rendered 110px/180px away from where it should be,
overlapping unrelated nav items — indistinguishable from "did nothing"
to a user. Every other page's CSS already had this correctly scoped;
only the two files were inconsistent.

Confirmed via screenshots at 375px width: `intro_team.php` (uses
`team.min.css`) and `coach_liao.php`/`coach_wang.php` (`coach.min.css`)
showed the broken floating submenu; `gallery.php` (`sortGallery.min.css`,
correctly scoped) showed it properly indented under its parent item.

**Fix:** added the missing `.is-fixed ` prefix to that one selector in
both files, matching every other page's CSS. Verified both the mobile
(375px) and desktop (1280px, which was already working) cases via
Playwright screenshots before and after.

## 2026-10-08 — De-minified the JS the root pages load

Minifying `bootstrap.js`/`blog.js` buys nothing for a low-traffic club
site (no CDN cost or mobile-data pressure at this scale) and actively
slowed down diagnosing the bug just above, since `blog.min.js` is
exactly the file with the nav click handlers. `js/jquery.js` was
already the unminified build in every page.

- Switched `templates/partials/footer.php` from `js/bootstrap.min.js`
  to `js/bootstrap.js` — already present in the repo, confirmed
  byte-equivalent (same Bootstrap v3.3.4, just formatted), so this is
  a same-behavior swap for all 20 root pages in one place.
- Rewrote `js/blog.min.js`'s logic as a new, readable `js/blog.js`
  (no original unminified source existed for this one — it's this
  site's own ~15-line script, not a vendored library) and pointed all
  18 root pages that loaded it at the new file instead.
- Left `js/bootstrap.min.js` and `js/blog.min.js` in place rather than
  deleting them — confirmed both are still loaded by the out-of-scope
  `gallery/*.html` pages (dozens of them) and by
  `tests/legacy/allposts_test.php`, none of which this pass touches.
- `js/bootstrap4.min.js` was checked and confirmed unused by anything
  in the repo, root pages included — left alone (not this pass's
  scope to remove unrelated dead files, though it's a candidate for a
  future cleanup).

Verified with `php -l` on all touched `.php` files and a Playwright
pass confirming the nav (including the just-fixed third-level
dropdown) still works correctly after the swap, at both mobile and
desktop widths.

## 2026-10-08 — index.php's nav dropdowns didn't open at all

Follow-up report after the fix above: the nav still didn't work on
`index.php` specifically, while every other page was fine.

Cause: unlike the other 19 root pages, `index.php` (and `allposts.php`)
never loaded `blog.min.js`/`blog.js` in the first place — this predates
all of this session's changes. Without it, the `.nav>li>a`/`.nav>li>ul>li>a`
click handlers that toggle `levelOneOpen`/`levelTwoOpen` were never
bound, so clicking any dropdown trigger on `index.php` did nothing at
the first level already (`allposts.php` was fine since it already had
its own `<script src="js/blog.js">` tag alongside its custom inline
script — `index.php` just never did).

**Fix:** added the missing `<script src="js/blog.js"></script>` tag to
`index.php`, matching `allposts.php`'s existing pattern. Verified with
Playwright against a scratch copy with the DB-dependent article-loading
block stubbed out (this sandbox's PHP lacks `mbstring`, needed by
`config/db.php` — see above) but the `<head>`/nav/scripts byte-identical
to the real file: both mobile and desktop third-level dropdowns now
open correctly.

## 2026-10-08 — Migrated gallery/*.html (56 files) onto the shared partials

Continuing AGENT.md's deferred "separate, larger batch": the 13
top-level `gallery/*.html` listing pages and 43 one-level-deeper
`gallery/<event>/<file>.html` detail pages, left untouched by the
root-page pass above.

Scoping this turned up a real bug the root-page pass introduced as a
side effect: every one of these 56 pages' nav menus still linked to
the root pages by their old `.html` path (`../intro_team.html`,
`../competition.html`, etc.), all of which have 404'd since those were
renamed to `.php`. Moving gallery pages onto the shared navbar partial
fixes this everywhere in one pass.

- Added an optional `$basePath` parameter (default `''`, so the 20
  existing root pages are unaffected) to `templates/partials/{head,
  navbar,footer}.php`, prefixing the `css/`/`js/` asset paths and the
  navbar's root-page links — the only change needed to make the same
  three partials work for pages one or two directories deep.
- Converted the 13 listing pages (`git mv .html → .php`) onto
  `$basePath = '../'`, `$pageCss` = `sortGallery.min.css` (11 pages)
  or `friendly.min.css` (`friendly.php`/`special.php`, a pre-existing
  CSS-only fork), plus `$extraScripts` loading `js/blog.js`. Updated
  each page's own links into its subdirectory (e.g. `wind.php`'s
  `wind/2013wind.html` → `.php`) and `gallery.php`'s 12 outbound links.
- Converted the 43 detail subpages onto `$basePath = '../../'`,
  `$pageCss = 'galDetail.min.css'`, `$extraHead` adding
  `baguetteBox.min.css`, and `$extraScripts` adding
  `baguetteBox.min.js` + the one byte-identical
  `baguetteBox.run('.gallery');` init call every subpage already had.
- `gallery/2016meichu.html` was physically at listing-tier depth but
  used `galDetail.min.css` and `../../`-depth paths throughout — a
  pre-existing bug, since from that location `../../` points *above*
  the webroot, breaking its own CSS/JS/images/nav. Converted it with
  the detail-subpage recipe but at its real depth (`$basePath = '../'`,
  and rewrote its body's stray `../../` image paths to `../`), fixing
  it rather than preserving the breakage.
- `gallery/fengyuan/2013fengyuan.html` had a stale, structurally
  different nav (flat links, old labels, a dead `leader.html` target)
  — standardized onto the same shared nav as every other page.
- Deleted `gallery/meichu/2023.html` (0 bytes, no content).
- Updated the 39 now-stale `gallery/...html` `<loc>` entries in
  `sitemap.xml` to `.php` (left the one unrelated, already-stale
  `leader.html` entry alone — out of scope here, same as the sitemap
  domain left stale in the root-page pass).
- Converting onto the shared partials also silently fixed several
  smaller pre-existing inconsistencies for free: `wind.html`'s
  `href="ttps://..."` typo (missing leading `h`, ×2), the old stale
  `zh-tw.facebook.com` footer link on every one of these 56 pages
  (now matches the current `www.facebook.com/p/...` link), and minor
  copyright-text/CDN-protocol variants across a handful of files.

Used a one-off Python script (not committed) to do the mechanical
head/nav/footer boilerplate swap across all 56 files, since the two
tiers are each internally ~100% uniform; spot-checked its output
against every noted one-off before applying it.

Verified every converted file with `php -l`, then ran the whole site
through PHP's built-in server: all 55 converted pages (56 minus the
deleted empty one) return 200, old `.html` URLs now 404, exactly one
`href="#"` per page (now also disabling gallery pages' own "活動照片"
self-link, via `$activePage = 'gallery'`, which they'd never done
before), and nav links from gallery pages into root pages now resolve
instead of 404ing. Playwright screenshots at mobile (375px) and
desktop (1280px) widths on one listing page and one detail page
confirm the nav, header image, and image grid/lightbox all render
correctly.

## 2026-10-08 — Deploy pipeline audit: `.env` deletion risk + dead gallery image refs

Continuing AGENT.md's remaining deferred item — confirming asset paths
and the deployment process end to end before considering the `public/`
move. Scanned every local `src=`/`href=` across all root, admin, and
gallery pages against the filesystem (~8,700 references): no broken
CSS/JS paths anywhere, including through the gallery migration above.

Two real risks turned up in `.cpanel.yml` itself, both from the same
mechanism: deploy mirrors the repo via `rsync --delete` (added
2026-10-07 specifically to auto-remove anything untracked from
`public_html`), with deliberate excludes for things that must persist
on the server without being in git.

- **`.env` was missing from that exclude list.** `config/db.php` needs
  `.env` to sit at `public_html/.env` to supply live DB credentials —
  the same requirement `config/db.local.php` has, which is why
  `db.local.php` was excluded in the first place. The exclude list was
  never updated when `.env` support was added, so if production's
  `.env` only lives in `public_html` (not in the server-side git
  checkout rsync copies *from*), the next deploy would silently delete
  it. **Fix:** added `--exclude='.env'` to `.cpanel.yml`, matching the
  `db.local.php` precedent.
- **167 `<a href>`/`<img src>` attributes (84 distinct gallery photos)
  pointed at image files not present anywhere in the repo** — spread
  across `cmu/2013cmu.php`, `university/2014preliminary.php`,
  `university/2015final.php` (54 of the 84), `university/
  2015preliminary2.php`, `wind/2018wind.php`, `DrPro/2014DrPro.php`,
  `jinzhu/2018jinzhu.php`, and `friendly/2023DaTong.php`. Confirmed
  with the user these are gone from the live server too, not just this
  checkout — not a side effect of the head/nav/footer migration above,
  which never touched body image lists.

  Before removing anything, checked each missing reference for a
  same-name file under a different extension, since `rsync --delete`
  mirroring makes "untracked" and "actually gone" look identical from
  inside the repo alone:
  - `jinzhu/2018jinzhu.php`: `2018-76.jpgG` (stray trailing "G") →
    fixed to `2018-76.jpg`, which exists; thumbnail reference was
    already correct.
  - `friendly/2023DaTong.php`: pointed at `IMG_3041.HEIC`, but only
    `IMG_3041.jpg` was ever saved (no `thumbnails/` subdir for this
    one-photo event at all). This was the page's *only* photo, so
    fixing it instead of deleting it kept the page from becoming an
    empty gallery shell. Rewrote both `href` and `img src` to the one
    real `.jpg` file directly, matching how the listing page
    (`gallery/friendly.php`) already references the same file as its
    cover image.
  - The remaining 63 live (uncommented) references were genuinely
    gone — removed their `<a href="…"><img src="…"></a>` lines outright
    from `university/2015final.php` (54), `wind/2018wind.php` (8), and
    `university/2015preliminary2.php` (1).
  - 21 more matched the same missing-file pattern but were already
    inside pre-existing HTML comments (`cmu/2013cmu.php`: 17 across
    several multi-line comment blocks; `DrPro/2014DrPro.php` and
    `university/2014preliminary.php`: 1 each) — already inert on the
    live page, left untouched. Verified the comment open/close count
    in every touched file is unchanged, so no comment block was
    accidentally left unterminated by a deletion landing on a line
    that doubled as a block's closing `-->`.

Verified with `php -l` on all touched files and a repo-wide rescan
confirming zero remaining broken local asset references outside of
the untouched, already-commented-out ones.
