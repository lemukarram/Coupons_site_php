<?php

require "core.php";

// Get Item Slug
$itemId = clearGetData(getItemId());

if(empty($itemId)){

	header('Location: '. $urlPath->home());
}

// Page Details
$itemDetails = getCouponById($connect, $itemId);

if(empty($itemDetails)){

	header('Location: '. $urlPath->error());
}

$itemsGallery = getItemsGallery($connect, $itemId);

// Seo Title
$titleSeoHeader = getSeoTitle(empty($itemDetails['coupon_seotitle']) ? $itemDetails['coupon_title'] : $itemDetails['coupon_seotitle']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDetails['coupon_description'], $itemDetails['coupon_seodescription']);

// Page Title
$pageTitle = $itemDetails['coupon_title'];

if (isLogged()) {

$isFav = isInFav($connect, $userInfo['user_id'], $itemId);

}

include './header.php';
require './views/single-coupon.view.php';
include './footer.php';

?>