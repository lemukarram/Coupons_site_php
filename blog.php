<?php
require "core.php";

$posts = getPosts($connect, 20);

// Seo Title
$titleSeoHeader = getSeoTitle($translation['tr_1'], _POSTS);

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);

include './header.php';
include './sections/header.php';

require './views/blog.view.php';

include './sections/footer.php';
include './footer.php';
?>
