<?php

// Details

$couponId = clearGetData(getCode());

$couponDetails = getCouponById($connect, $couponId);

$modalAD = getModalAd($connect, $couponId);

$isLike = isLike($connect, $couponId);

require './views/single-modal.view.php';

?>