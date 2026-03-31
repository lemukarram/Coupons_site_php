# Couponza - Coupons & Discounts PHP Script

Couponza is a professional and high-performance PHP script designed for managing coupons, discounts, and deals. It provides a robust platform for building a coupon website with a modern UI and comprehensive admin control.

## 🚀 Features

- **Store Management:** Manage multiple stores with custom slugs, logos, and descriptions.
- **Coupon System:** Create and manage various types of coupons (Code, Deal, Printable).
- **Categorization:** Organize coupons by categories and subcategories for easy navigation.
- **User System:** Role-based access control (Admin, Editor, User) with secure sign-in and sign-up.
- **Slider Management:** Beautiful sliders for featured content on the home page.
- **Ad Management:** Integrated ad spaces (Header, Footer, Sidebar) to monetize your platform.
- **Multi-language Support:** Easily translate the entire site and manage multiple languages from the admin panel.
- **SEO Optimized:** Custom titles, descriptions, and clean URLs for better search engine visibility.
- **Page Management:** Create custom pages like Privacy Policy, Terms of Service, etc.
- **Email Templates:** Customizable email templates for various system notifications.
- **Modern UI:** Responsive design using modern CSS/JS components.
- **Maintenance Mode:** Quickly toggle maintenance mode to perform updates.

## 🛠 Tech Stack

- **Backend:** PHP (Vanilla)
- **Database:** MySQL (PDO for secure data handling)
- **Security:** Anti-XSS protection, CSRF protection.
- **Email:** PHPMailer integration.
- **Frontend:** HTML5, CSS3, JavaScript (Tabler UI components).

## 📁 Project Structure

- `/admin`: Full-featured administration panel.
- `/assets`: CSS, JS, and font assets.
- `/classes`: Core utility classes (CSRF, File Uploader, etc.).
- `/controllers`: Frontend logic and request handling.
- `/images`: Uploaded images for coupons, stores, and sliders.
- `/pages`: View logic for different sections of the site.
- `/sections`: Reusable UI components (header, footer, sidebar).
- `/views`: Template files for rendering the UI.

## 🔧 Installation

1. Upload all files to your server.
2. Create a MySQL database.
3. Import the provided SQL file (if available) or follow the installation wizard.
4. Update `config.php` with your database credentials and site URL:
   ```php
   $database = array(
       'host' => 'localhost',
       'db' => 'your_db_name',
       'user' => 'your_db_user',
       'pass' => 'your_db_pass'
   );
   define('SITE_URL', 'https://yourdomain.com');
   ```

## 🛡 Security

- Always keep your `config.php` secure.
- Ensure the `admin` directory is protected.
- Regularly update to the latest version for security patches.

