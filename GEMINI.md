# Couponza Project Context (GEMINI.md)

## Overview
Couponza is a PHP-based coupon and discount management platform. It uses a custom MVC-like architecture where controllers handle logic and views handle presentation.

## Architecture
- **Core:** `core.php` initializes the application, including configuration, common functions, and routing.
- **Routing:** Handled by `Routes` class in `routes.php`. It maps slugs to different pages like stores, coupons, and custom pages.
- **Database:** Uses PDO for database operations. Configuration is in `config.php`.
- **Functions:** `functions.php` contains global helper functions for database access, authentication checks, and data manipulation.
- **Admin:** The `/admin` directory contains a full management suite, using its own set of controllers and views.
- **Views:** Frontend templates are located in `/views`. UI components are in `/sections`.

## Key Files & Responsibilities
- `config.php`: Database credentials and global constants (`SITE_URL`).
- `core.php`: Bootstraps the application (session, config, functions, routing, settings).
- `functions.php`: Global utility functions (connect, auth, data fetching).
- `routes.php`: URL generation logic.
- `index.php`: Entry point for the frontend, renders the home view.
- `/admin/controller/`: Backend logic for managing different entities.
- `/classes/`: Core utility classes (CSRF protection, file uploads, etc.).

## Development Standards
- **Database:** Always use PDO with prepared statements to prevent SQL injection.
- **Security:** Use the included `AntiXSS` class for filtering user input. CSRF tokens should be verified for sensitive operations.
- **Styling:** Follow the existing Tabler UI patterns for frontend and backend.
- **Translations:** All text shown to users should be fetched through the `$translation` array (managed via `getStrings()` in `core.php`).
- **Assets:** Use the `Routes` class to generate paths for images, CSS, and JS files.

## Common Operations
- **Checking Authentication:** Use `isLogged()`, `isAdmin()`, or `isEditor()` functions from `functions.php`.
- **Fetching Data:** Functions in `functions.php` like `getSettings()`, `getStoreBySlug()`, `getCouponById()` are the primary way to interact with the database.
- **Adding New Features:** Usually involves adding a new controller in `/controllers` (frontend) or `/admin/controller` (backend), updating `routes.php` if needed, and creating corresponding view files.

## Dependencies
- PHP >= 7.4
- MySQL
- PHPMailer (included in `/classes`)
- AntiXSS (included in `/classes`)
- Tabler Icons & UI Components (included in `/assets`)
