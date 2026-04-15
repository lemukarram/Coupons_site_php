<?php
/**
 * Migration Script: Bulletproof Import with Smart Categorization, Image Linking & Homepage Optimization
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
require 'functions.php';

set_time_limit(0);
ini_set('memory_limit', '512M');

$connect = connect();
if (!$connect) {
    die("Database connection failed.\n");
}

function logMsg($msg) {
    echo "[" . date('Y-m-d H:i:s') . "] " . $msg . "\n";
}

// 1. ENSURE SCHEMA & CLEANUP
logMsg("Ensuring database schema is ready...");
try {
    $connect->exec("ALTER TABLE stores ADD COLUMN store_url VARCHAR(255) DEFAULT NULL");
} catch (Exception $e) {}

logMsg("Starting cleanup...");
$tablesToClear = ['coupons', 'stores', 'categories', 'subcategories', 'reviews', 'likes'];
foreach ($tablesToClear as $table) {
    $connect->exec("TRUNCATE TABLE $table");
    logMsg("Table '$table' cleared.");
}

// Unique slug generator
function getUniqueSlug($connect, $table, $column, $title) {
    $title = (string)$title;
    if (empty($title)) $title = "item";
    $slug = function_exists('convertSlug') ? convertSlug($title) : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    if (empty($slug)) $slug = "item";
    $originalSlug = $slug;
    $i = 1;
    while (true) {
        $stmt = $connect->prepare("SELECT COUNT(*) FROM $table WHERE $column = :slug");
        $stmt->execute([':slug' => $slug]);
        if ($stmt->fetchColumn() == 0) break;
        $slug = $originalSlug . "-" . (++$i);
    }
    return $slug;
}

// 2. PRE-LOAD STORE LOGOS
$logoMap = []; 
if (file_exists("data/stores.csv") && ($handle = fopen("data/stores.csv", "r")) !== FALSE) {
    fgetcsv($handle); 
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (!empty($data[1])) $logoMap[strtolower(trim($data[1]))] = trim($data[3]);
    }
    fclose($handle);
}

// 3. SMART CATEGORIZATION
logMsg("Creating Smart Parent Categories...");
$parentStructure = [
    'Tech & Electronics' => ['Mobile & Accessories', 'Electronics', 'Computer & Laptops', 'Software', 'Ineternet & Cellular'],
    'Fashion & Beauty' => ['Fashion & Clothing', 'Fashion', 'Shoes', 'Jewlery', 'Watches', 'Skincare & Cosmetics'],
    'Home & Garden' => ['Home & Garden', 'Furniture', 'Kitchen & Equipments', 'Lights and Lamps', 'Bedding & household linen', 'Arts & Crafts', 'Flowers and Decor'],
    'Health & Wellness' => ['Pharmacy & Health', 'Glasses & Contact lenses', 'Sportswear Fitness and bodybuilding'],
    'Leisure & Entertainment' => ['Movies, Music & Games', 'Games and toys', 'Travel & Tour', 'Hotel & Resorts', 'Eat & Drink', 'Sports', 'Entertainment'],
    'Shopping' => ['Shopping'],
    'Family & Kids' => ['Toys and Babies'],
    'Business & Professional' => ['Office', 'Stationary', 'Services', 'Tools', 'Vehicles', 'Pet Supplies', 'Books & Magazines']
];

$parentMapping = []; 
foreach (array_keys($parentStructure) as $pName) {
    $slug = getUniqueSlug($connect, 'categories', 'category_slug', $pName);
    $stmt = $connect->prepare("INSERT INTO categories (category_title, category_slug, category_featured, category_menu, category_status, category_icon, category_image) VALUES (:title, :slug, 1, 1, 1, 'tag', '')");
    $stmt->execute([':title' => $pName, ':slug' => $slug]);
    $parentMapping[$pName] = $connect->lastInsertId();
}

logMsg("Importing 37 Categories as Subcategories...");
$subCategoryMapping = []; 
$parentOfSubMapping = []; 
if (($handle = fopen("data/categories.csv", "r")) !== FALSE) {
    fgetcsv($handle);
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (empty($data[0]) || empty($data[1])) continue;
        $oldId = $data[0]; $title = trim($data[1]);
        $parentId = $parentMapping['Business & Professional'];
        foreach ($parentStructure as $pName => $children) {
            if (in_array($title, $children)) { $parentId = $parentMapping[$pName]; break; }
        }
        $slug = getUniqueSlug($connect, 'subcategories', 'subcategory_slug', $title);
        $stmt = $connect->prepare("INSERT INTO subcategories (subcategory_parent, subcategory_title, subcategory_slug, subcategory_description, subcategory_seotitle, subcategory_seodescription) VALUES (:parent, :title, :slug, :description, :seotitle, :seodescription)");
        $stmt->execute([':parent' => $parentId, ':title' => $title, ':slug' => $slug, ':description' => $data[4] ?? '', ':seotitle' => $data[5] ?? '', ':seodescription' => $data[7] ?? '']);
        $subId = $connect->lastInsertId();
        $subCategoryMapping[$oldId] = $subId;
        $parentOfSubMapping[$oldId] = $parentId;
    }
    fclose($handle);
}

// 4. IMPORT STORES (Optimized for Homepage)
logMsg("Importing Stores...");
$storeMapping = []; 
$storeImageMapping = []; 
$storesCsv = "data/stores_all.csv";
$storeCount = 0;

if (($handle = fopen($storesCsv, "r")) !== FALSE) {
    $headers = fgetcsv($handle);
    $offset = (empty($headers[0])) ? 1 : 0;
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (!isset($data[$offset]) || empty($data[$offset])) continue;
        $oldId = $data[$offset]; $title = trim($data[$offset + 1]);
        $logo = $logoMap[strtolower($title)] ?? '';
        
        // Only feature the first 12 stores for the homepage
        $isFeatured = ($storeCount < 12) ? 1 : 0;
        
        try {
            $slug = getUniqueSlug($connect, 'stores', 'store_slug', $title);
            $stmt = $connect->prepare("INSERT INTO stores (store_title, store_slug, store_url, store_description, store_seotitle, store_seodescription, store_featured, store_status, store_image) VALUES (:title, :slug, :url, :description, :seotitle, :seodescription, :featured, 1, :image)");
            $stmt->execute([':title' => $title, ':slug' => $slug, ':url' => $data[$offset + 8] ?? $data[$offset + 2] ?? '', ':description' => $data[$offset + 10] ?? '', ':seotitle' => $data[$offset + 3] ?? '', ':seodescription' => $data[$offset + 5] ?? '', ':featured' => $isFeatured, ':image' => $logo]);
            $newId = $connect->lastInsertId();
            $storeMapping[$oldId] = $newId;
            $storeImageMapping[$newId] = $logo;
            $storeCount++;
        } catch (Exception $e) { logMsg("Error store '$title': " . $e->getMessage()); }
    }
    fclose($handle);
}

// 5. IMPORT COUPONS (Corrected Mapping)
logMsg("Importing Coupons...");
$couponCount = 0;
if (($handle = fopen("data/coupons.csv", "r")) !== FALSE) {
    fgetcsv($handle);
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (empty($data[0])) continue;
        $title = trim($data[1]);
        if (is_numeric($title) && (float)$title > 0 && (float)$title < 1) $title = ((float)$title * 100) . "% OFF";
        
        $oldCatId = $data[2]; $oldStoreId = $data[3];
        $newParentCatId = $parentOfSubMapping[$oldCatId] ?? 0;
        $newSubCatId = $subCategoryMapping[$oldCatId] ?? 0;
        $newStoreId = $storeMapping[$oldStoreId] ?? 0;
        $image = $storeImageMapping[$newStoreId] ?? '';
        
        try {
            $slug = getUniqueSlug($connect, 'coupons', 'coupon_slug', $title);
            $expiry = !empty($data[13]) ? date('Y-m-d H:i:s', strtotime($data[13])) : NULL;
            $stmt = $connect->prepare("INSERT INTO coupons (coupon_title, coupon_slug, coupon_description, coupon_category, coupon_subcategory, coupon_store, coupon_code, coupon_link, coupon_expire, coupon_status, coupon_author, coupon_featured, coupon_exclusive, coupon_created, coupon_image) VALUES (:title, :slug, :description, :category, :subcategory, :store, :code, :link, :expire, 1, 1, 0, 0, NOW(), :image)");
            
            // Corrected Coupon Mapping based on CSV analysis:
            // 4: RedirectUrl, 5: Description, 10: Code, 13: Expiry
            $stmt->execute([
                ':title' => $title, 
                ':slug' => $slug, 
                ':description' => !empty($data[5]) ? $data[5] : ($data[24] ?? ''), 
                ':category' => $newParentCatId, 
                ':subcategory' => $newSubCatId, 
                ':store' => $newStoreId, 
                ':code' => $data[11] ?? $data[10] ?? '', 
                ':link' => $data[4] ?? '', 
                ':expire' => $expiry, 
                ':image' => $image
            ]);
            $couponCount++;
        } catch (Exception $e) { logMsg("Error coupon '$title': " . $e->getMessage()); }
    }
    fclose($handle);
}
logMsg("Migration completed! Coupons: $couponCount, Stores: $storeCount");
?>
