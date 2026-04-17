<?php

$slugCategory = getSlugCategory();

if(!$slugCategory){
    header('Location: '. $urlPath->home());
    exit;
}

$category = getTagCategoryBySlug($slugCategory);

if(!$category){
    header('Location: '. $urlPath->home());
    exit;
}

$category = $category[0]; // getTagCategoryBySlug returns fetchAll()

// SEO
$titleSeoHeader = getSeoTitle($translation['tr_1'], $category['category_title']);
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $category['category_description'], $category['category_seodescription']);

$subcategories = getSubCategories($connect, $category['category_id']);
$featuredStores = getStoresByCategorySlug($connect, $slugCategory);

$getResults = getCouponsByCategory($connect, $site_config['page_limit'], $category['category_id']);

$items = $getResults['items'];
$total = $getResults['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

require './pages/views/category-detail.view.php';
