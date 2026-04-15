<?php
/**
 * Migration Script: Clear previous data and import new data from CSV
 */

require 'config.php';
require 'functions.php';

// Increase limits for large import
set_time_limit(0);
ini_set('memory_limit', '512M');

$connect = connect();
if (!$connect) {
    die("Database connection failed.\n");
}

function logMsg($msg) {
    echo "[" . date('Y-m-d H:i:s') . "] " . $msg . "\n";
}

// 1. CLEANUP PREVIOUS DATA
logMsg("Starting cleanup...");
$tablesToClear = ['coupons', 'stores', 'categories', 'subcategories', 'reviews', 'likes'];
foreach ($tablesToClear as $table) {
    $connect->exec("TRUNCATE TABLE $table");
    logMsg("Table '$table' cleared.");
}

// Helper to generate slug and handle duplicates (simplified for migration)
function getUniqueSlug($connect, $table, $column, $title) {
    $slug = convertSlug($title);
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

// 2. IMPORT CATEGORIES
logMsg("Importing categories...");
$categoryMapping = []; // OldID => NewID
if (($handle = fopen("data/categories.csv", "r")) !== FALSE) {
    $headers = fgetcsv($handle); // ID,Name,Icon,Banner,Description,MetaTittle,MetaKeyword,MetaDescription
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (empty($data[0])) continue;
        
        $oldId = $data[0];
        $title = $data[1];
        $slug = getUniqueSlug($connect, 'categories', 'category_slug', $title);
        
        $stmt = $connect->prepare("INSERT INTO categories (category_title, category_slug, category_icon, category_description, category_seotitle, category_seodescription, category_featured, category_menu, category_status) VALUES (:title, :slug, :icon, :description, :seotitle, :seodescription, 1, 1, 1)");
        
        $stmt->execute([
            ':title' => $title,
            ':slug' => $slug,
            ':icon' => !empty($data[2]) ? str_replace('fa ', '', $data[2]) : 'tag', // Clean font-awesome prefix if needed for Tabler
            ':description' => $data[4],
            ':seotitle' => $data[5],
            ':seodescription' => $data[7]
        ]);
        
        $categoryMapping[$oldId] = $connect->lastInsertId();
    }
    fclose($handle);
}
logMsg("Categories imported: " . count($categoryMapping));

// 3. IMPORT STORES
logMsg("Importing stores...");
$storeMapping = []; // OldID => NewID
// Map logos from stores.csv if they match by name
$storeLogos = [];
if (file_exists("data/stores.csv") && ($handle = fopen("data/stores.csv", "r")) !== FALSE) {
    fgetcsv($handle); // Headers
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (!empty($data[1])) $storeLogos[strtolower(trim($data[1]))] = $data[3];
    }
    fclose($handle);
}

if (($handle = fopen("data/stores_all.csv", "r")) !== FALSE) {
    $headers = fgetcsv($handle); // ID,Name,Url,MetaTittle,MetaKeyword,MetaDescription,CategoryID,AffiliatePaidUrl,AffiliateUrl,Website,Description
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (empty($data[0])) continue;
        
        $oldId = $data[0];
        $title = $data[1];
        $slug = getUniqueSlug($connect, 'stores', 'store_slug', $title);
        $logo = isset($storeLogos[strtolower(trim($title))]) ? $storeLogos[strtolower(trim($title))] : '';
        
        $stmt = $connect->prepare("INSERT INTO stores (store_title, store_slug, store_url, store_description, store_seotitle, store_seodescription, store_image, store_featured, store_status) VALUES (:title, :slug, :url, :description, :seotitle, :seodescription, :image, 1, 1)");
        
        $stmt->execute([
            ':title' => $title,
            ':slug' => $slug,
            ':url' => $data[8], // Using AffiliateUrl
            ':description' => $data[10],
            ':seotitle' => $data[3],
            ':seodescription' => $data[5],
            ':image' => $logo
        ]);
        
        $storeMapping[$oldId] = $connect->lastInsertId();
    }
    fclose($handle);
}
logMsg("Stores imported: " . count($storeMapping));

// 4. IMPORT COUPONS
logMsg("Importing coupons...");
$couponCount = 0;
if (($handle = fopen("data/coupons.csv", "r")) !== FALSE) {
    $headers = fgetcsv($handle); 
    // ID,Tittle,Category ID,Store Id,RedirectUrl,Description,type of coupon,MetaTittle,MetaKeyword,MetaDescription,Code,Image,ExpiryDate,Position,Status,UserID,Date,UpdateDate,ShowOnHome,TittlePostFix,Prefix,Postfix,Tag,Details,Desp
    while (($data = fgetcsv($handle)) !== FALSE) {
        if (empty($data[0])) continue;
        
        $title = $data[1];
        $oldCatId = $data[2];
        $oldStoreId = $data[3];
        $slug = getUniqueSlug($connect, 'coupons', 'coupon_slug', $title);
        
        $newCatId = isset($categoryMapping[$oldCatId]) ? $categoryMapping[$oldCatId] : 0;
        $newStoreId = isset($storeMapping[$oldStoreId]) ? $storeMapping[$oldStoreId] : 0;
        
        // Expiry date format handling
        $expiry = !empty($data[12]) ? date('Y-m-d H:i:s', strtotime($data[12])) : NULL;
        
        $stmt = $connect->prepare("INSERT INTO coupons (coupon_title, coupon_slug, coupon_description, coupon_category, coupon_store, coupon_code, coupon_link, coupon_expire, coupon_status, coupon_author, coupon_featured, coupon_exclusive, coupon_created) VALUES (:title, :slug, :description, :category, :store, :code, :link, :expire, 1, 1, 0, 0, NOW())");
        
        $stmt->execute([
            ':title' => $title,
            ':slug' => $slug,
            ':description' => !empty($data[5]) ? $data[5] : $data[24],
            ':category' => $newCatId,
            ':store' => $newStoreId,
            ':code' => $data[10],
            ':link' => $data[4],
            ':expire' => $expiry
        ]);
        $couponCount++;
    }
    fclose($handle);
}
logMsg("Coupons imported: $couponCount");
logMsg("Migration completed successfully!");
?>
