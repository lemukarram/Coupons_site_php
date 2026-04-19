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
	header('Location: ./error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){


$stat = $connect->prepare("SELECT navigation_order FROM navigations ORDER BY navigation_order DESC LIMIT 1");
$stat->execute();
$row = $stat->fetch(PDO::FETCH_ASSOC);
$orderNumber = $row["navigation_order"]; 

$newOrder = $orderNumber + 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$navigation_url = cleardata($_POST['navigation_url']);
$navigation_label = cleardata($_POST['navigation_label']);
$navigation_target = cleardata($_POST['navigation_target']);
$navigation_parent = !empty($_POST['navigation_parent']) ? cleardata($_POST['navigation_parent']) : null;
$navigation_type = cleardata($_POST['navigation_type']);
$menu_id = $_POST["menu_id"];

$navigation_icon = cleardata($_POST['navigation_icon_class']);

if(isset($_FILES['navigation_icon_image']) && $_FILES['navigation_icon_image']['error'] == 0) {
    $extsAllowed = array('jpg', 'jpeg', 'png', 'gif', 'svg');
    $extUpload = strtolower( substr( strrchr($_FILES['navigation_icon_image']['name'], '.') ,1) ) ;

    if (in_array($extUpload, $extsAllowed) ) { 

        $image = $_FILES['navigation_icon_image']['tmp_name'];
        $imagefile = explode(".", $_FILES["navigation_icon_image"]["name"]);
        $renamefile = round(microtime(true)) . '.' . end($imagefile);
        $image_upload = '../../images/';
        move_uploaded_file($image, $image_upload . 'nav_' . $renamefile);
        $navigation_icon = 'nav_' . $renamefile;
    }
}

$statment = $connect->prepare("INSERT INTO navigations (navigation_id,navigation_order,navigation_url,navigation_label,navigation_target,navigation_type,navigation_menu,navigation_icon,navigation_parent) VALUES (null, :navigation_order, :navigation_url, :navigation_label, :navigation_target, :navigation_type, :navigation_menu, :navigation_icon, :navigation_parent)");

	$statment->execute(array(
		':navigation_order' => $newOrder,
		':navigation_url' => $navigation_url,
		':navigation_label' => $navigation_label,
		':navigation_target' => $navigation_target,
		':navigation_type' => $navigation_type,
		':navigation_menu' => $menu_id,
		':navigation_icon' => $navigation_icon,
		':navigation_parent' => $navigation_parent
		));


}

}elseif($check_access['user_role'] == 2){

	require '../views/denied.view.php';
	
}else{
	
	header('Location:'.SITE_URL);
}
    
}else {
		header('Location: ./login.php');		
		}


?>