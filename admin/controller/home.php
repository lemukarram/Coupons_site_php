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
require '../views/header.view.php';

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1 || $check_access['user_role'] == 2){

$users_total = users_total($connect); 
$coupons_total = coupons_total($connect);
$coupons = get_latest_coupons($connect);

require '../views/home.view.php';

}else{

	header('Location:'.SITE_URL);

}

require '../views/footer.view.php';
    
}else {
		header('Location: ./login.php');		
		}


?>