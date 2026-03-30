<?php

$featuredCoupons = getFeaturedCoupons($connect, $site_config['featured_items']);

require './sections/views/featured-coupons.view.php';

?>