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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $post_title = cleardata($_POST['post_title']);
    $post_content = $_POST['post_content'];
    $post_seotitle = cleardata($_POST['post_seotitle']);
    $post_seodescription = cleardata($_POST['post_seodescription']);
    $post_status = cleardata($_POST['post_status']);
    $post_image = $_FILES['post_image'];

    if (empty($post_image['name'])) {
        $image = null;
    } else {
        $image_file = explode('.', $post_image['name']);
        $image_extension = end($image_file);
        $image_name = time() . '.' . $image_extension;
        $image_path = "../../images/" . $image_name;
        move_uploaded_file($post_image['tmp_name'], $image_path);
        $image = $image_name;
    }

    $post_slug = cleardata($_POST['post_slug']);

    if (empty($post_slug)) {
        $slug = convertSlug($post_title);
    }else{
        $slug = convertSlug($post_slug);
    }

    $exists = get_post_slug($connect, $slug);
    if ($exists > 0){
        $new_number = $exists + 1;
        $slug = $slug."-".$new_number;
    }

    $statment = $connect->prepare(
        "INSERT INTO posts (post_title, post_content, post_seotitle, post_seodescription, post_status, post_slug, post_image, post_author) VALUES (:post_title, :post_content, :post_seotitle, :post_seodescription, :post_status, :post_slug, :post_image, :post_author)"
    );

    $statment->execute(array(
        ':post_title' => $post_title,
        ':post_content' => $post_content,
        ':post_seotitle' => $post_seotitle,
        ':post_seodescription' => $post_seodescription,
        ':post_status' => $post_status,
        ':post_slug' => $slug,
        ':post_image' => $image,
        ':post_author' => $check_access['user_id']
    ));

    header('Location: ./posts.php');

}else{
    require '../views/header.view.php';
    require '../views/new.post.view.php';
    require '../views/footer.view.php';
}

}elseif($check_access['user_role'] == 2){
    require '../views/denied.view.php';
    require '../views/footer.view.php';
}else{
    header('Location:'.SITE_URL);
}
    
} else {
    header('Location: ./login.php');
}
?>
