<!DOCTYPE html>
<html lang="<?php echo isset($langCode) ? echoOutput($langCode) : 'de'; ?>" dir="<?php echo $langDir; ?>" <?php echo (isset($fullHeight)) ? ' class="uk-height-1-1"' : NULL ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="shortcut icon" href="<?php echo $urlPath->image($theme['th_favicon']); ?>">
<?php if(isset($titleSeoHeader) && !empty($titleSeoHeader)): ?>
<title><?php echo echoOutput($titleSeoHeader); ?></title>
<?php endif; ?>
<?php if(isset($descriptionSeoHeader) && !empty($descriptionSeoHeader)): ?>
<meta name="description" content="<?php echo echoOutput($descriptionSeoHeader); ?>">
<?php endif; ?>
<?php if (isset($canonicalUrl) && !empty($canonicalUrl)): ?>
<link rel="canonical" href="<?php echo echoOutput($canonicalUrl); ?>">
<?php endif; ?>
<?php
// Open Graph & Twitter Card — uses $ogImage set by entry point, falls back to site logo
$_ogUrl   = isset($canonicalUrl) ? $canonicalUrl : SITE_URL;
$_ogType  = isset($ogType) ? $ogType : 'website';
$_ogDesc  = isset($descriptionSeoHeader) ? $descriptionSeoHeader : '';
$_ogImage = isset($ogImage) && !empty($ogImage)
    ? $ogImage
    : (isset($theme['th_logo']) ? $urlPath->image($theme['th_logo']) : '');
?>
<?php if (isset($titleSeoHeader) && !empty($titleSeoHeader)): ?>
<meta property="og:type" content="<?php echo echoOutput($_ogType); ?>">
<meta property="og:site_name" content="<?php echo echoOutput($translation['tr_1']); ?>">
<meta property="og:title" content="<?php echo echoOutput($titleSeoHeader); ?>">
<meta property="og:description" content="<?php echo echoOutput($_ogDesc); ?>">
<meta property="og:url" content="<?php echo echoOutput($_ogUrl); ?>">
<?php if (!empty($_ogImage)): ?>
<meta property="og:image" content="<?php echo echoOutput($_ogImage); ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo echoOutput($titleSeoHeader); ?>">
<meta name="twitter:description" content="<?php echo echoOutput($_ogDesc); ?>">
<?php if (!empty($_ogImage)): ?>
<meta name="twitter:image" content="<?php echo echoOutput($_ogImage); ?>">
<?php endif; ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('styles.css'); ?>">
<?php if ($langDir == 'rtl'): ?>
<script type="text/javascript"> window.FontAwesomeConfig = { autoReplaceSvg: false }</script>
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('uikit-rtl.css'); ?>">
<link rel="stylesheet" href="<?php echo $urlPath->assets_css('theme-rtl.css'); ?>">
<?php endif;?>
<script src="<?php echo $urlPath->assets_js('jquery.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit.js'); ?>"></script>
<script src="<?php echo $urlPath->assets_js('uikit-icons.js'); ?>"></script>
<script async src="https://www.google.com/recaptcha/api.js"></script>

<script type="text/javascript">
/* Global js vars */
var SITEURL = "<?php echo SITE_URL; ?>";
var IMAGES_FOLDER = "<?php echo $urlPath->image(); ?>";
</script>
<?php if(isset($settings['st_analytics']) && !empty($settings['st_analytics'])): ?>
<?php if(!empty($_COOKIE['cc_analytics']) && $_COOKIE['cc_analytics'] === '1'): ?>
<?php echo $settings['st_analytics']; ?>
<?php else: ?>
<script>window.__analyticsCode=<?php echo json_encode($settings['st_analytics']); ?>;</script>
<?php endif; ?>
<?php endif; ?>

</head> 
<body <?php echo (isset($fullHeight)) ? 'class="uk-height-1-1"' : NULL ?>>

<div id="preloader">
<div class="spinner">
<div class="uil-ripple-css" style="transform:scale(0.40);">
<div></div>
<div></div>
</div>
</div>
</div>

<?php if($maintenanceMode == 1 && isAdmin()): ?>
<div class="tas-alert-danger uk-margin-remove" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p><i class="fas fa-exclamation-triangle uk-margin-small-right"></i> <?php echo echoOutput($translation['tr_maintenancetitle']); ?></p>
</div>
<?php endif; ?>

<?php require './sections/sidemenu.php'; ?>


<?php if(getCodeParams()): ?>
<?php include './single-modal.php'; ?>
<?php endif; ?>