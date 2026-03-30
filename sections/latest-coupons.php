<?php

$latestCoupons = getLatestCoupons($connect, $site_config['latest_items']);

require './sections/views/latest-coupons.view.php';

?>