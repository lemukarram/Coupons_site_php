<?php

$section_long_text = getHomeSection($connect, 'long_text');
$section_about_us = getHomeSection($connect, 'about_us');
$section_how_to_use = getHomeSection($connect, 'how_to_use');
$section_subscribe = getHomeSection($connect, 'subscribe');

require './sections/views/home_sections.view.php';
?>
