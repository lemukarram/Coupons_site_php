<?php

$slugCategory = getSlugCategory();
$slugSubCategory = getSlugSubCategory();

if(!$slugCategory && !$slugSubCategory){
    header('Location: '. $urlPath->home());
    exit;
}

if($slugSubCategory){
    // Subcategory mode
    $item = getSubCategoryBySlug($connect, $slugSubCategory);
    if(!$item){
        header('Location: '. $urlPath->home());
        exit;
    }
    $itemTitle = $item['subcategory_title'];
    $itemDescription = $item['subcategory_description'];
    $itemSeoDescription = $item['subcategory_seodescription'];
    
    // For breadcrumbs and sub-subcategories (if any)
    $parentCategory = getCategoryById($connect, $item['subcategory_parent']);
    $itemImage = ($item['subcategory_image'] ?? $parentCategory['category_image'] ?? "categories/placeholder.png");
    $subcategories = []; // Maybe other subcategories of same parent?
    
    $getResults = getCouponsBySubCategory($connect, $site_config['page_limit'], $item['subcategory_id']);
    $featuredStores = getStoresByCategorySlug($connect, $parentCategory['category_slug']); // Fallback to parent category stores

} else {
    // Category mode
    $item = getCategoryBySlug($connect, $slugCategory);
    if(!$item){
        header('Location: '. $urlPath->home());
        exit;
    }
    $itemTitle = $item['category_title'];
    $itemDescription = $item['category_description'];
    $itemSeoDescription = $item['category_seodescription'];
    $itemImage = $item['category_image'];
    
    $subcategories = getSubCategories($connect, $item['category_id']);
    $featuredStores = getStoresByCategorySlug($connect, $slugCategory);
    
    $getResults = getCouponsByCategory($connect, $site_config['page_limit'], $item['category_id']);
}

// SEO
$titleSeoHeader = getSeoTitle($translation['tr_1'], $itemTitle);
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $itemDescription, $itemSeoDescription);

$items = $getResults['items'];
$total = $getResults['total'];

$numPages = numTotalPages($total, $site_config['page_limit']);

require './pages/views/category-detail.view.php';
