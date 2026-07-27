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

// Seo Description — truncate content to 155 chars when no explicit SEO description is set
$_postExcerpt = mb_substr(strip_tags($post['post_content']), 0, 155);
$descriptionSeoHeader = getSeoDescription($translation['tr_3'], $_postExcerpt, $post['post_seodescription']);

// Canonical URL
$canonicalUrl = $urlPath->post($slugItem);

// Open Graph — article type with post image
$ogType  = 'article';
$ogImage = !empty($post['post_image']) ? $urlPath->image($post['post_image']) : '';

// JSON-LD: BlogPosting
$schemaJsonLd = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BlogPosting',
    'headline' => $post['post_title'],
    'url' => $canonicalUrl,
    'datePublished' => isset($post['post_date']) ? $post['post_date'] : '',
    'image' => $ogImage ?: '',
    'publisher' => [
        '@type' => 'Organization',
        'name' => $translation['tr_1'],
        'url' => SITE_URL
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include './header.php';
include './sections/header.php';

require './views/single-post.view.php';

include './sections/footer.php';
include './footer.php';
?>
