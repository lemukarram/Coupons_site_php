<?php

require "core.php";

$connect = connect();

if (!$connect) {
    echo "Connection failed";
    exit;
}

echo "Starting migration: Seeding coupon taglines...<br>";

// Fetch all coupons where tagline is empty or null
$query = "SELECT coupon_id, coupon_title, coupon_tagline FROM coupons";
$sentence = $connect->prepare($query);
$sentence->execute();
$coupons = $sentence->fetchAll(PDO::FETCH_ASSOC);

$updated = 0;
foreach ($coupons as $coupon) {
    if (empty($coupon['coupon_tagline'])) {
        // Use the title as the tagline, limited to 150 chars (as per schema)
        $newTagline = substr($coupon['coupon_title'], 0, 150);
        
        $updateQuery = "UPDATE coupons SET coupon_tagline = :tagline WHERE coupon_id = :id";
        $updateSentence = $connect->prepare($updateQuery);
        $updateSentence->execute([
            ':tagline' => $newTagline,
            ':id' => $coupon['coupon_id']
        ]);
        $updated++;
    }
}

echo "Migration finished. Total coupons updated: $updated";

?>
