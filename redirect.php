<?php

require_once "core.php";

$getCode = clearGetData(getCode());

if(empty($getCode) && !isset($getCode)){

	header('Location: '. $urlPath->home());
    exit;

}else{

    $statement = $connect->prepare("SELECT * FROM coupons WHERE coupon_id = :coupon_id LIMIT 1");
    $statement->execute(array(':coupon_id' => $getCode));
    $result = $statement->fetch();
  
    if ($result != false) {
      
	    header('Location: '. $result['coupon_link']);
        exit;

    }else{

	    header('Location: '. $urlPath->home());
        exit;
    }

}

?>