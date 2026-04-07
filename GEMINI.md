# Couponza Project Context (GEMINI.md)

## Overview
Couponza is a high-performance PHP-based coupon and discount management platform. It allows users to find, share, and use coupons from various stores and categories. It features a custom MVC-like architecture, a robust admin panel, and multi-language support.

## Architecture & Framework
- **Language:** PHP >= 7.4
- **Database:** MySQL using PDO with prepared statements for security.
- **Frontend UI:** Based on **Tabler UI** components and icons.
- **Routing:** Custom routing handled via the `Routes` class in `routes.php`. It generates clean URLs for stores, categories, pages, and assets.
- **Security:** 
    - **AntiXSS:** Used for filtering user input and preventing XSS attacks.
    - **CSRF Protection:** Managed via `classes/csrf.php`.
    - **Authentication:** Sessions-based with roles: Admin (1), Editor (2), and regular Users.

## Key Directories
- `/admin`: Full backend management suite. The `/admin/controller` directory follows a flat structure where each action (new, edit, delete, get) for an entity (e.g., `new_coupon.php`, `edit_coupon.php`) is handled in its own file.
- `/assets`: Global frontend CSS, JS, Fonts, and Icons.
- `/classes`: Core utility classes (CSRF, Slugify, PHPMailer, AntiXSS).
- `/controllers`: Logic for frontend actions (reviews, likes, subscribers).
- `/pages`: Logic for main frontend pages (categories, search, stores).
- `/sections`: Reusable UI components (featured-coupons, sidemenu, etc.).
- `/views`: Template files for different pages.
- `/images`: Uploaded assets for stores, coupons, categories, etc.

## Core Files
- `config.php`: Database connection details and global `SITE_URL`.
- `core.php`: Application bootstrapper. Initializes sessions, DB connection, settings, themes, translations, and global constants.
- `functions.php`: The "heart" of the project. Contains all business logic, data fetching functions, and utility helpers.
- `routes.php`: Centralized URL management.
- `index.php`: Entry point for the frontend home page.
- `header.php` / `footer.php`: Global layout wrappers.

## Database Schema (Key Tables)
- `users`: User profiles, roles, and status.
- `coupons`: Main coupon data (codes, links, expiry, store/category relationships).
- `stores`: Store details (logos, descriptions, slugs).
- `categories` / `subcategories`: Hierarchical organization for coupons.
- `reviews` / `likes`: User engagement data.
- `subscribers`: Email list for newsletters.
- `pages`: Custom CMS pages (Privacy Policy, Terms, etc.).
- `settings`: Global site configuration (SEO, SMTP, Timezone, Maintenance mode).
- `translations`: Key-value pairs for multi-language support (accessed via `$translation` array).
- `ads`: Managed ad slots (header, footer, sidebar, modal).
- `navigations` / `menus`: Dynamic menu management.
- `sliders`: Homepage hero sliders.
- `emailtemplates`: Templates for system emails (forgot password, etc.).

## Development Standards
- **DB Queries:** Always use `$connect->prepare()` and `$sentence->execute()` to prevent SQL injection.
- **Input Handling:** Wrap all `$_GET`/`$_POST` data in `clearGetData()` or similar sanitization functions.
- **Translations:** Use the `$translation['tr_X']` keys for all user-facing text.
- **URL Generation:** Use `$urlPath->method()` from the `Routes` class instead of hardcoding URLs.
- **Styling:** Adhere to Tabler UI patterns. Use `assets/css/custom.css` for overrides.
- **Logic:** Keep logic in `functions.php` or controllers; keep views (`.view.php`) focused on presentation.

## Common Workflows
- **Fetching Data:** Use existing functions like `getCouponById($connect, $id)`, `getStoreBySlug($connect, $slug)`, etc.
- **Authentication Check:** Use `isLogged()`, `isAdmin()`, or `isEditor()`.
- **Handling Assets:** Use `$urlPath->image($filename)` or `$urlPath->assets_css($filename)`.
- **Adding a Page:** 
    1. Add logic in a new file or in `/pages`.
    2. Update `routes.php` if a new URL pattern is needed.
    3. Create a view in `/views`.
