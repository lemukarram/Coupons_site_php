<?php

$featuredCategories = getFeaturedCategories($connect);
$featuredStores = getFeaturedStores($connect);
$menuCategories = getMenuCategories($connect);
$getSliders = getSliders($connect);

if ($theme['th_homestyle'] == 'home1') {

	require './sections/views/home-1.view.php';

}elseif ($theme['th_homestyle'] == 'home2') {
	
	require './sections/views/home-2.view.php';

}elseif ($theme['th_homestyle'] == 'home3') {
	
	require './sections/views/home-3.view.php';
}

?>