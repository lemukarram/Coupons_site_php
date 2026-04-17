<?php
require "core.php";
$connect = connect();
if (!$connect) { echo "Connection failed"; exit; }

echo "Adding navigation_parent column to navigations table...<br>";
try {
    $connect->exec("ALTER TABLE navigations ADD COLUMN navigation_parent INT(11) DEFAULT NULL AFTER navigation_menu");
    echo "Column added successfully.<br>";
} catch (Exception $e) {
    echo "Error adding column (maybe it already exists?): " . $e->getMessage() . "<br>";
}
?>
