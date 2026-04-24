<?php

$exclusiveCoupons = getFeaturedCoupons($connect, $site_config['featured_items']);

require './sections/views/exclusive-coupons.view.php';

?>