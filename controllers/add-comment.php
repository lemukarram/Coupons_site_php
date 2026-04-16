<?php
session_start();
require '../core.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $post_id = clearGetData($_POST['post_id']);
    $post_slug = clearGetData($_POST['post_slug']);
    $name = clearGetData($_POST['name']);
    $email = clearGetData($_POST['email']);
    $content = clearGetData($_POST['content']);

    if(empty($post_id) || empty($name) || empty($email) || empty($content)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $result = addComment($connect, $post_id, $name, $email, $content);

    if($result){
        header('Location: ' . $urlPath->post($post_slug) . '#comments');
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}else{
    header('Location: ' . SITE_URL);
}
?>
