<?php 

/*--------------------*/
// Description: Couponza - Coupons & Discounts Php Script
// Author: Wicombit
// Author URI: https://www.wicombit.com
/*--------------------*/

session_start();
if (isset($_SESSION['user_email'])){
    
require '../../config.php';
require '../functions.php';

$connect = connect($database);
if(!$connect){
    header ('Location: ./error.php');
}

$check_access = check_access($connect);
if ($check_access['user_role'] == 1){

    $id_post = id_post($_GET['id']);

    if (empty($id_post)){
        header('Location: ./posts.php');
    }

    $statment = $connect->prepare("DELETE FROM posts WHERE post_id = :post_id");
    $statment->execute(array(':post_id' => $id_post));

    header('Location: ./posts.php');

}elseif($check_access['user_role'] == 2){
    require '../views/denied.view.php';
}else{
    header('Location:'.SITE_URL);
}
    
} else {
    header('Location: ./login.php');
}
?>
