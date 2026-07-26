<?php

require "core.php";

$slugItem = clearGetData(getSlugItem());

if(empty($slugItem) && !isset($slugItem)){

	header('Location: '. $urlPath->home());
}

// Get ID By Slug
$itemDetails = getStoreBySlug($connect, $slugItem);

if(empty($itemDetails)){

	header('Location: '. $urlPath->home());
	
}

$getResults = getCouponsByStore($connect, $site_config['page_limit'], $itemDetails['store_id']);

$items = $getResults['items'];
$total = $getResults['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

// Seo Title
$titleSeoHeader = getSeoTitle(empty($itemDetails['store_seotitle']) ? $itemDetails['store_title'] : $itemDetails['store_seotitle']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDetails['store_description'], $itemDetails['store_seodescription']);

// Canonical URL — always the clean slug URL, strips any ?c=XX param
$canonicalUrl = $urlPath->store($slugItem);

// Open Graph image — store logo
$ogImage = !empty($itemDetails['store_image']) ? $urlPath->image($itemDetails['store_image']) : '';

// Page Title
$pageTitle = $itemDetails['store_title'];

include './header.php';
require './views/single-store.view.php';
include './footer.php';

?>