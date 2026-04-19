<?php 
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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$navigation_id = cleardata($_POST['navigation_id']);
$navigation_label = cleardata($_POST['navigation_label']);
$navigation_url = isset($_POST['navigation_url']) ? cleardata($_POST['navigation_url']) : null;
$navigation_page = isset($_POST['navigation_page']) ? cleardata($_POST['navigation_page']) : null;
$navigation_target = cleardata($_POST['navigation_target']);
$navigation_parent = !empty($_POST['navigation_parent']) ? cleardata($_POST['navigation_parent']) : null;
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

$sql = "UPDATE navigations SET 
        navigation_label = :label, 
        navigation_target = :target, 
        navigation_parent = :parent, 
        navigation_icon = :icon";

$params = array(
    ':label' => $navigation_label,
    ':target' => $navigation_target,
    ':parent' => $navigation_parent,
    ':icon' => $navigation_icon,
    ':id' => $navigation_id
);

if ($navigation_url !== null) {
    $sql .= ", navigation_url = :url";
    $params[':url'] = $navigation_url;
}
if ($navigation_page !== null) {
    $sql .= ", navigation_page = :page";
    $params[':page'] = $navigation_page;
}

$sql .= " WHERE navigation_id = :id";

$statement = $connect->prepare($sql);
$statement->execute($params);

}
}
}
?>