<?php

require '../core.php';

$couponId = clearGetData($_GET['id']);

if($couponId){
    $_GET['c'] = $couponId; // For getCodeParams()
    $couponDetails = getCouponById($connect, $couponId);
    $modalAD = getModalAd($connect, $couponId);
    $isLike = isLike($connect, $couponId);

    require '../views/single-modal.view.php';
}
?>