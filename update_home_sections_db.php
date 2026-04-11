<?php
require 'config.php';
require 'functions.php';

$connect = connect();

if (!$connect) {
    die("Connection failed");
}

try {
    // Add new columns
    $connect->exec("ALTER TABLE home_sections ADD COLUMN section_order INT DEFAULT 0");
    $connect->exec("ALTER TABLE home_sections ADD COLUMN section_status INT DEFAULT 1");
    echo "Columns added successfully.\n";
} catch (Exception $e) {
    echo "Columns might already exist.\n";
}

// Add system sections to the table for ordering
$system_sections = [
    'sys_featured_stores' => ['title' => 'Featured Stores', 'description' => 'System Section'],
    'sys_exclusive_coupons' => ['title' => 'Exclusive Coupons', 'description' => 'System Section'],
    'sys_featured_categories' => ['title' => 'Featured Categories', 'description' => 'System Section'],
    'sys_featured_coupons' => ['title' => 'Featured Coupons', 'description' => 'System Section'],
    'sys_latest_coupons' => ['title' => 'Latest Coupons', 'description' => 'System Section'],
    'sys_home_style' => ['title' => 'Home Style/Hero', 'description' => 'System Section (Slider/Search)']
];

foreach ($system_sections as $name => $data) {
    $stmt = $connect->prepare("INSERT IGNORE INTO home_sections (section_name, section_title, section_description, section_status) VALUES (:name, :title, :description, 1)");
    $stmt->execute([':name' => $name, ':title' => $data['title'], ':description' => $data['description']]);
}

// Ensure initial custom sections exist
$custom_sections = [
    'long_text' => ['title' => 'Our Services', 'description' => 'Detailed information about our services'],
    'about_us' => ['title' => 'About Us', 'description' => 'Learn more about our company'],
    'how_to_use' => ['title' => 'How to use Coupons', 'description' => 'Follow these simple steps to save money'],
    'subscribe' => ['title' => 'Subscribe to our Newsletter', 'description' => 'Get the latest coupons directly in your inbox'],
    'footer_about' => ['title' => 'About Us', 'description' => 'We provide the best coupons'],
    'footer_service_title' => ['title' => 'Service', 'description' => NULL],
    'footer_pursue_title' => ['title' => 'Pursue', 'description' => NULL],
    'footer_like_us_title' => ['title' => 'Like us on', 'description' => NULL]
];

foreach ($custom_sections as $name => $data) {
    $stmt = $connect->prepare("INSERT IGNORE INTO home_sections (section_name, section_title, section_description, section_status) VALUES (:name, :title, :description, 1)");
    $stmt->execute([':name' => $name, ':title' => $data['title'], ':description' => $data['description']]);
}

echo "Sections updated.\n";
?>
