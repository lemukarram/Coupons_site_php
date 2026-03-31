<?php
require 'config.php';
require 'functions.php';

$connect = connect($database);

try {
    $connect->exec("ALTER TABLE navigations ADD COLUMN navigation_icon VARCHAR(255) DEFAULT NULL");
    echo "Column 'navigation_icon' added successfully.";
} catch (Exception $e) {
    echo "Error or column already exists: " . $e->getMessage();
}
?>
