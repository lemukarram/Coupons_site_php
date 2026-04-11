<?php

// Get Menu Footer
$footermenu = getFooterMenu($connect);
$navigationFooter = getNavigation($connect, $footermenu['menu_id']);

// Get Footer Section Data
$footer_about = getHomeSection($connect, 'footer_about');
$footer_service_title = getHomeSection($connect, 'footer_service_title');
$footer_pursue_title = getHomeSection($connect, 'footer_pursue_title');
$footer_like_us_title = getHomeSection($connect, 'footer_like_us_title');

require './sections/views/footer.view.php';

?>
