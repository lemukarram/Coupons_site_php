<?php

require "core.php";

// Seo Title
$titleSeoHeader = $translation['tr_1'] . ' – Discount Codes & Vouchers';

// Seo Description
$descriptionSeoHeader = getSeoDescription($translation['tr_3']);

// Canonical URL
$canonicalUrl = $urlPath->home();

// LCP preload — first active slider image
$_firstSliders = getSliders($connect);
if (!empty($_firstSliders)) {
    $heroImageUrl = $urlPath->image($_firstSliders[0]['slider_image']);
}

// JSON-LD: WebSite + Organization
$schemaJsonLd = json_encode([
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'WebSite',
            '@id' => SITE_URL . '/#website',
            'name' => $translation['tr_1'],
            'url' => SITE_URL,
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => SITE_URL . '/search?q={search_term_string}'
                ],
                'query-input' => 'required name=search_term_string'
            ]
        ],
        [
            '@type' => 'Organization',
            '@id' => SITE_URL . '/#organization',
            'name' => $translation['tr_1'],
            'url' => SITE_URL
        ]
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

include './header.php';
include './views/index.view.php';
include './footer.php';

?>