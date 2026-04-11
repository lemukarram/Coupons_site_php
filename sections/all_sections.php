<?php

// Fetch all home sections ordered by section_order
$query = $connect->query("SELECT * FROM home_sections ORDER BY section_order ASC");
$all_home_sections = $query->fetchAll();

foreach ($all_home_sections as $section) {
    
    // Skip disabled sections
    if ($section['section_status'] == 0) continue;

    switch ($section['section_name']) {
        
        // SYSTEM SECTIONS
        case 'sys_home_style':
            if ($theme['th_homestyle'] == 'home1') {
                require './sections/views/home-1.view.php';
            } elseif ($theme['th_homestyle'] == 'home2') {
                require './sections/views/home-2.view.php';
            } elseif ($theme['th_homestyle'] == 'home3') {
                require './sections/views/home-3.view.php';
            }
            break;

        case 'sys_featured_stores':
            require './sections/featured-stores.php';
            break;

        case 'sys_exclusive_coupons':
            require './sections/exclusive-coupons.php';
            break;

        case 'sys_featured_categories':
            require './sections/featured-categories.php';
            break;

        case 'sys_featured_coupons':
            require './sections/featured-coupons.php';
            break;

        case 'sys_latest_coupons':
            require './sections/latest-coupons.php';
            break;

        // CUSTOM SECTIONS
        case 'long_text':
            $section_long_text = $section;
            require './sections/views/long_text.view.php';
            break;

        case 'about_us':
            $section_about_us = $section;
            require './sections/views/about_us.view.php';
            break;

        case 'how_to_use':
            $section_how_to_use = $section;
            require './sections/views/how_to_use.view.php';
            break;

        case 'subscribe':
            $section_subscribe = $section;
            require './sections/views/subscribe.view.php';
            break;
    }
}
?>
