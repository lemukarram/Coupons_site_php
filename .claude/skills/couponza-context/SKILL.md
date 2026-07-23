---
name: couponza-context
description: Project context for the Couponza PHP coupon/discount site. Load when working anywhere in this repo — architecture, routing, DB schema, conventions, and where to make changes for stores, coupons, categories, pages, admin, or the frontend.
---

# Couponza — Project Context

Couponza is a vanilla-PHP coupon & discount management platform (stores, coupons, categories, admin panel, multi-language). Deployed as a plain PHP folder — no build step, no composer autoload, no framework. Files are `require`/`include`-wired.

## Tech stack
- **Backend:** PHP >= 7.4, procedural + a few classes. No framework, no Composer.
- **Database:** MySQL via **PDO with prepared statements** (`connect()` in `functions.php`).
- **Frontend:** HTML5/CSS3/JS built on **Tabler UI** components + icons. Overrides in `assets/css/custom.css`.
- **Libraries (vendored in `/classes`):** PHPMailer (email), AntiXSS (input filtering), CSRF (`classes/csrf.php`), Slugify, FileUploader, `ssp.class.php` (DataTables server-side).

## How the app boots
1. Every frontend entry file `require "core.php"` first.
2. `core.php` → `session_start()`, then requires `config.php`, `functions.php`, `routes.php`; calls `connect()` → `$connect` (PDO).
3. Loads globals: `$settings`, `$theme`, `$translation`, ads (`$headerAd`/`$footerAd`/`$sidebarAd`), `$socialMedia`, `$userInfo` (if logged), default-page constants (`SEARCH_PAGE`, `PRIVACY_PAGE`, `TERMS_PAGE`, `CATEGORIES_PAGE`, `STORES_PAGE`), and `$urlPath = new Routes()`.
4. Handles maintenance-mode redirect to `offline.php`.

Typical entry file pattern (see `index.php`):
```php
require "core.php";
$titleSeoHeader = getSeoTitle($translation['tr_1']);
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);
include './header.php';
include './views/index.view.php';
include './footer.php';
```
`header.php`/`footer.php` are thin wrappers that include `views/header.view.php` / `views/footer.view.php`.

## Routing
- **URLs:** Apache `.htaccess` rewrites clean URLs to physical PHP files, e.g. `store/{slug}` → `single-store.php?slug=...`, `redirect/{code}` → `redirect.php`, `blog/{slug}` → `single-post.php`, and a catch-all `^([^/]+)/?$` → `single-page.php?slug=...`. `config.php` is denied direct access.
- **Link generation:** ALWAYS use the `Routes` class (`routes.php`) via `$urlPath`, never hardcode URLs. Examples: `$urlPath->store($slug)`, `$urlPath->image($file)`, `$urlPath->assets_css($file)`, `$urlPath->search($array)`, `$urlPath->page($slug)`.

## Directory map
- `/` (root) — frontend entry points (`index.php`, `single-store.php`, `signin.php`, etc.) + core files.
- `core.php` — bootstrapper. `functions.php` — **the business-logic heart** (~1000+ lines: all data-fetch functions, auth helpers, input sanitizers). `routes.php` — URL builder. `config.php` — DB creds + `SITE_URL` (gitignored, not in repo).
- `/admin` — full backend. `admin/controller/` uses a **flat one-file-per-action** structure: `new_coupon.php`, `edit_coupon.php`, `delete_coupon.php`, `get_coupons.php` (DataTables JSON), plus `admin/views/*.view.php`, `admin/functions.php`, `admin/lang`, `admin/emails`.
- `/controllers` — frontend AJAX/form actions (`like.php`, `add-review.php`, `add-comment.php`, `add-subscriber.php`, `favorites.php`, `update-profile.php`).
- `/pages` + `/pages-data` — logic for list pages (categories, search, stores, category-detail).
- `/sections` — reusable UI blocks (featured-coupons, featured-stores, latest-coupons, sidemenu, pagination, etc.).
- `/views` — presentation templates (`*.view.php`).
- `/classes` — vendored libraries. `/assets` — CSS/JS/fonts/icons. `/images` — uploaded media.
- `new-design`, `demo`, `data` — non-production/scratch; leave alone unless asked.

## Key database tables
`users`, `coupons`, `stores`, `categories`/`subcategories`, `reviews`/`likes`, `subscribers`, `pages`, `settings` (SEO/SMTP/timezone/maintenance), `translations` (i18n key→value), `ads`, `navigations`/`menus`, `sliders`, `emailtemplates`, `posts` (blog).

## Conventions (follow these)
- **DB access:** `$connect->prepare(...)` + `->execute([...])` with bound params. Never string-concatenate SQL.
- **Input:** wrap `$_GET`/`$_POST` in `clearGetData()` / `validateInput()` / AntiXSS before use.
- **Auth guards:** `isLogged()`, `isAdmin()`, `isEditor()`, `isExclusive()`, `isVerified()`. Roles: Admin=1, Editor=2, User.
- **User-facing text:** use `$translation['tr_X']` keys — do not hardcode strings.
- **Data fetching:** reuse existing helpers (`getCouponById`, `getStoreBySlug`, `getFeaturedCoupons`, `getStores`, `getCategoryBySlug`, `getSearch`, ...) — check `functions.php` before writing new queries.
- **Separation:** keep logic in `functions.php`/controllers, keep `*.view.php` for presentation only.
- **Styling:** stay within Tabler UI patterns; put overrides in `assets/css/custom.css`.
- **Escaping output:** helpers like `echoOutput()`, `echoNoHtml()`, `textTruncate()` exist for safe rendering.

## Adding things — where to touch
- **New frontend page:** add entry logic (root file or `/pages`), add rewrite in `.htaccess` if a new URL pattern is needed, add a method in `routes.php`, create the view in `/views`.
- **New admin entity action:** add `new_/edit_/delete_/get_` files in `admin/controller/`, matching `*.view.php` in `admin/views/`, wire into the admin nav/menu.
- **New reusable UI block:** add to `/sections` and include where needed.

## Environment / deploy
- Local: plain folder, no compiler. Serve with any PHP host (e.g. `php -S localhost:8000` after providing a `config.php`).
- `config.php`, `.htaccess`, `.env`, and `*.md` are **gitignored** (git user is "Gemini CLI"). `servers.md` holds SSH deploy targets (dev/live on Hostinger) and is not committed. Do not commit secrets or `config.php`.

## Notes
- There is also a `GEMINI.md` at the repo root with overlapping project context; keep the two roughly in sync when documenting architecture changes.
