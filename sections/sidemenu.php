<?php

// Get Menu Header
$sidebarMenu = getSidebarMenu($connect);
$navigationSidebar = getNavigation($connect, $sidebarMenu['menu_id']);

// Get Header Menu for mobile
$headerMenu = getHeaderMenu($connect);
$navigationHeader = getNavigation($connect, $headerMenu['menu_id']);

require './sections/views/sidemenu.view.php';

?>