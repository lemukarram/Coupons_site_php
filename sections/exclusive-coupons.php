<?php

$exclusiveCoupons = getExclusiveCoupons($connect, $site_config['featured_items']);

require './sections/views/exclusive-coupons.view.php';

?>