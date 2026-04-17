<?php require './sections/header.php'; ?>

<div class="cat-banner">
    <div class="uk-container">
        <div class="cat-banner-grid">
            <div class="cat-banner-img">
                <img src="<?php echo $urlPath->image(fixImg($itemImage)); ?>" alt="<?php echo echoOutput($itemTitle); ?>">
            </div>
            <div class="cat-banner-content">
                <div class="breadcrumb">
                    <a href="<?php echo $urlPath->home(); ?>"><?php echo echoOutput($translation['tr_1']); ?></a> » 
                    <a href="<?php echo $urlPath->categories(); ?>"><?php echo echoOutput($translation['tr_4']); ?></a> » 
                    <?php if($slugSubCategory && isset($parentCategory)): ?>
                        <a href="<?php echo $urlPath->search(['category' => $parentCategory['category_slug']]); ?>"><?php echo echoOutput($parentCategory['category_title']); ?></a> » 
                    <?php endif; ?>
                    <span><?php echo echoOutput($itemTitle); ?></span>
                </div>
                <h1><?php echo echoOutput($itemTitle); ?></h1>
                <div class="description">
                    <?php echo echoOutput($itemDescription); ?>
                </div>

                <?php if(!empty($subcategories)): ?>
                <div class="related-cats">
                    <h4><?php echo echoOutput($translation['tr_92'] ?? 'Related categories:'); ?></h4>
                    <div class="cat-tags">
                        <?php foreach($subcategories as $sub): ?>
                        <a href="<?php echo $urlPath->search(['category' => $item['category_slug'], 'subcategory' => $sub['subcategory_slug']]); ?>" class="cat-tag">
                            <?php echo echoOutput($sub['subcategory_title']); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="uk-container page uk-margin-medium-top">
    <div class="uk-grid-large" uk-grid>

        <!-- SIDEBAR -->
        <div class="uk-width-1-1 uk-width-1-4@m sidebar uk-visible@m">
            <?php require './sections/views/search-form.view.php'; ?>
        </div>
        <!-- END SIDEBAR -->

        <!-- CONTENT -->
        <div class="uk-width-1-1 uk-width-expand@m content">

            <div class="uk-hidden@m uk-margin-bottom">
                <a class="uk-button uk-button-default uk-border-rounded uk-flex uk-flex-center uk-flex-middle uk-width-1-1 fltr" uk-toggle="target: #searchModal">
                    <i class="ti ti-filter uk-text-primary uk-margin-small-right"></i>
                    <?php echo echoOutput($translation['tr_90']); ?>
                </a>
            </div>

            <?php if(!empty($featuredStores)): ?>
            <div class="feat-stores-section">
                <h3><?php echo echoOutput($translation['tr_93'] ?? 'Featured Stores'); ?></h3>
                <div class="feat-stores-grid">
                    <?php foreach($featuredStores as $st): ?>
                    <a href="<?php echo $urlPath->store($st['store_slug']); ?>" class="feat-store-item">
                        <div class="feat-store-logo">
                            <img src="<?php echo $urlPath->image(fixImg($st['store_image'])); ?>" alt="<?php echo echoOutput($st['store_title']); ?>">
                        </div>
                        <div class="feat-store-name"><?php echo echoOutput($st['store_title']); ?></div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="uk-margin-medium-top">
                <h3 class="uk-text-bold uk-margin-bottom"><?php echo echoOutput($itemTitle); ?> <?php echo echoOutput($translation['tr_16'] ?? 'vouchers'); ?> for <?php echo date('F Y'); ?></h3>
                
                <?php if(!empty($items)): ?>
                    <div class="uk-grid-medium uk-child-width-1-1" uk-grid>
                        <?php foreach($items as $item_coupon): ?>
                        <div class="h-coupon-item">
                            <div class="h-coupon-card">
                                <?php 
                                    $tagline = echoOutput($item_coupon['coupon_tagline']);
                                    $parts = explode(' ', $tagline, 2);
                                    $discount_val = $parts[0] ?? '';
                                    $discount_type = $parts[1] ?? '';
                                ?>
                                <div class="h-coupon-left">
                                    <span class="discount-val"><?php echo $discount_val; ?></span>
                                    <span class="discount-type"><?php echo $discount_type; ?></span>
                                </div>
                                <div class="h-coupon-middle">
                                    <div class="h-coupon-logo">
                                        <?php if($item_coupon['store_image']): ?>
                                            <img src="<?php echo $urlPath->image(fixImg($item_coupon['store_image'])); ?>" alt="<?php echo echoOutput($item_coupon['store_title']); ?>">
                                        <?php else: ?>
                                            <div class="no-image"><i class="ti ti-percentage"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="h-coupon-content">
                                        <h3 class="title"><?php echo echoOutput($item_coupon['coupon_title']); ?></h3>
                                        <a class="more-details-btn" uk-toggle="target: #toggle_<?php echo echoOutput($item_coupon['coupon_id']); ?>; animation: uk-animation-fade">
                                            <?php echo echoOutput($translation['tr_99']); ?> <i class="ti ti-chevron-down"></i>
                                        </a>
                                        <div class="h-coupon-extra">
                                            <?php if(!empty(echoOutput($item_coupon['coupon_expire']))): ?>
                                                <span><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($item_coupon['coupon_expire']); ?></span>
                                            <?php endif; ?>
                                            <?php if(isVerified(echoOutput($item_coupon['coupon_verify']))): ?>
                                                <span class="uk-margin-small-left"><i class="ti ti-check uk-text-success"></i> <?php echo echoOutput($translation['tr_26']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="h-coupon-right">
                                    <?php if(isExclusive(echoOutput($item_coupon['coupon_exclusive']))): ?>
                                        <div class="vch-ribbon">
                                            <span><?php echo echoOutput($translation['tr_16']); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <a class="h-coupon-btn c-open" data-id="<?php echo echoOutput($item_coupon['coupon_id']); ?>" data-redirect="<?php echo echoOutput($item_coupon['coupon_link']); ?>">
                                        <?php echo echoOutput($translation['tr_22']); ?> <i class="ti ti-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="h-coupon-details-box" id="toggle_<?php echo echoOutput($item_coupon['coupon_id']); ?>" hidden>
                                <p class="uk-margin-remove"><?php echo echoOutput($item_coupon['coupon_description']); ?></p>
                            </div>
                            <div class="h-coupon-footer">
                                <a href="<?php echo $urlPath->store($item_coupon['store_slug']); ?>">
                                    <?php echo echoOutput($translation['tr_21']); ?> <?php echo echoOutput($item_coupon['store_title']); ?> <?php echo echoOutput($translation['tr_16'] ?? 'vouchers'); ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php require './sections/pagination.php'; ?>
                <?php else: ?>
                    <div class="uk-width-1-1 uk-flex uk-flex-center uk-text-center uk-margin-large-top">
                        <div class="uk-width-1-1 uk-width-1-2@s">
                            <h3 class="uk-text-bold uk-margin-small"><?php echo echoOutput($translation['tr_109']); ?></h3>
                            <p class="uk-margin-small"><?php echo echoOutput($translation['tr_110']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require './sections/views/search-modal.view.php'; ?>
<?php require './sections/footer.php'; ?>
