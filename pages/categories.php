<?php

$getFeaturedCategories = getFeaturedCategories($connect);
$getCategories = getCategories($connect);

// Canonical URL for the categories directory
$canonicalUrl = $urlPath->categories();

require './pages/views/categories.view.php';

?>