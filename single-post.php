<?php
require "core.php";

$slugItem = isset($_GET['slug']) ? clearGetData($_GET['slug']) : clearGetData(getSlugItem());

if(empty($slugItem)){
    header('Location: '. $urlPath->blog());
}

$post = getPostBySlug($connect, $slugItem);

if(empty($post)){
    header('Location: '. $urlPath->blog());
}

$comments = getCommentsByPost($connect, $post['post_id']);

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], $post['post_title']);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $post['post_content'], $post['post_seodescription']);

include './header.php';
include './sections/header.php';

require './views/single-post.view.php';

include './sections/footer.php';
include './footer.php';
?>
