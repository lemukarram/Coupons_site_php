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

    $post_id = cleardata($_POST['post_id']);
    $post_title = cleardata($_POST['post_title']);
    $post_content = $_POST['post_content'];
    $post_seotitle = cleardata($_POST['post_seotitle']);
    $post_seodescription = cleardata($_POST['post_seodescription']);
    $post_status = cleardata($_POST['post_status']);
    $post_image_save = $_POST['post_image_save'];
    $post_image = $_FILES['post_image'];

    if (empty($post_image['name'])) {
        $image = $post_image_save;
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
        $slug = $_POST['post_slug_save'];
    }else{
        $converted_slug = convertSlug($_POST['post_slug']);
        $exists = get_post_slug($connect, $converted_slug);

        if ($exists > 0 && $converted_slug != $_POST['post_slug_save']){
            $new_number = $exists + 1;
            $slug = $converted_slug."-".$new_number;
        }else{
            $slug = $converted_slug;
        }
    }

    $statment = $connect->prepare(
        "UPDATE posts SET post_title = :post_title, post_content = :post_content, post_seotitle = :post_seotitle, post_seodescription = :post_seodescription, post_status = :post_status, post_slug = :post_slug, post_image = :post_image WHERE post_id = :post_id"
    );

    $statment->execute(array(
        ':post_id' => $post_id,
        ':post_title' => $post_title,
        ':post_content' => $post_content,
        ':post_seotitle' => $post_seotitle,
        ':post_seodescription' => $post_seodescription,
        ':post_status' => $post_status,
        ':post_slug' => $slug,
        ':post_image' => $image
    ));

    header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

    $id_post = id_post($_GET['id']);
    $post = get_post_per_id($connect, $id_post);

    if (!$post){
        header('Location: ./posts.php');
    }

    $post = $post['0'];
    require '../views/header.view.php';
    require '../views/edit.post.view.php';
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
