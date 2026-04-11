<?php

$featuredCategories = getFeaturedCategories($connect);
$featuredStores = getFeaturedStores($connect);
$menuCategories = getMenuCategories($connect);
$getSliders = getSliders($connect);

// This file now only prepares data. The rendering is handled in all_sections.php or index.view.php
// But we keep it for compatibility if some parts still rely on these variables.

?>
