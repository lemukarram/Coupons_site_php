<?php
require 'config.php';
require 'functions.php';

$connect = connect();
$stmt = $connect->query("SELECT coupon_id, coupon_title, coupon_status, coupon_exclusive, coupon_expire FROM coupons WHERE coupon_exclusive = 1");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "Current Time: " . getDateByTimeZone() . "\n";
echo "--------------------------------------------------\n";
foreach ($results as $row) {
    echo "ID: " . $row['coupon_id'] . " | Title: " . $row['coupon_title'] . "\n";
    echo "Status: " . $row['coupon_status'] . " | Exclusive: " . $row['coupon_exclusive'] . "\n";
    echo "Expire: " . ($row['coupon_expire'] ?: 'NULL') . "\n";
    
    $isExpired = false;
    if (!empty($row['coupon_expire'])) {
        if (getDateByTimeZone() > $row['coupon_expire']) {
            $isExpired = true;
        }
    }
    
    echo "Is Expired: " . ($isExpired ? 'YES' : 'NO') . "\n";
    echo "--------------------------------------------------\n";
}
?>
