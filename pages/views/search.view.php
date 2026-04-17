
<?php if(!empty($itemDetails['page_content'])): ?>
<div class="uk-container">
<div class="uk-width-1-1">
<?php echo $itemDetails['page_content']; ?>
</div>
</div>
<?php endif; ?>

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

        <?php if(false !== strpos($_SERVER['REQUEST_URI'], '?')): ?>

            <div class="uk-margin-bottom" uk-grid>
            
            <div class="uk-width-expand uk-flex uk-flex-middle">
            
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-grid-small" uk-grid>
            
            <?php if(getSearchQuery()): ?>
            <li>
                <a class="filterTag" data-value="query">
                    <p><?php echo echoOutput(getSearchQuery()); ?></p>
                    <i class="ti ti-x"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if(getSlugCategory()): ?>
            <li>
                <a class="filterTag" data-value="category">
                    <p><?php echo getTagCategoryBySlug(getSlugCategory()); ?></p>
                    <i class="ti ti-x"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if(getSlugSubCategory()): ?>
            <li>
                <a class="filterTag" data-value="subcategory">
                    <p><?php echo getTagSubCategoryBySlug(getSlugSubCategory()); ?></p>
                    <i class="ti ti-x"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if(getSlugStore()): ?>
            <li>
                <a class="filterTag" data-value="store">
                    <p><?php echo getTagStoreBySlug(getSlugStore()); ?></p>
                    <i class="ti ti-x"></i>
                </a>
            </li>
            <?php endif; ?>

            <?php if(getFilterParam()): ?>
            <li>
                <a class="filterTag" data-value="filter">
                    <p>
                        <?php echo echoOutput(getFilterParam()); ?>
                    </p>
                    <i class="ti ti-x"></i>
                </a>
            </li>
            <?php endif; ?>

            </ul>
            </div>
            </div>

            </div>


        <?php endif; ?>


    <div class="uk-grid-small" uk-grid>

    <div class="uk-width-1-2 uk-flex uk-flex-left uk-flex-middle">
        <div>
        <h5 class="uk-text-small uk-margin-remove"><?php echo $total; ?> <?php echo echoOutput($translation['tr_96']); ?></h5>
        </div>
    </div>

    <div class="uk-width-1-2 uk-flex uk-flex-right">

    </div>

    </div>

            <?php if(!empty($items)): ?>
                <div class="uk-grid-medium uk-child-width-1-1" uk-grid>

            <?php foreach($items as $item): ?>

            <div class="h-coupon-item">
                <div class="h-coupon-card">
                    
                    <?php 
                        // Simple parsing of tagline for discount value and type
                        // Expecting something like "10€ DISCOUNT" or "10% OFF"
                        $tagline = echoOutput($item['coupon_tagline']);
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
                            <?php if($item['store_image']): ?>
                                <img src="<?php echo $urlPath->image($item['store_image']); ?>" alt="<?php echo echoOutput($item['store_title']); ?>">
                            <?php else: ?>
                                <div class="no-image"><i class="ti ti-percentage"></i></div>
                            <?php endif; ?>
                        </div>
                        <div class="h-coupon-content">
                            <h3 class="title"><?php echo echoOutput($item['coupon_title']); ?></h3>
                            <a class="more-details-btn" uk-toggle="target: #toggle_<?php echo echoOutput($item['coupon_id']); ?>; animation: uk-animation-fade">
                                <?php echo echoOutput($translation['tr_99']); ?> <i class="ti ti-chevron-down"></i>
                            </a>
                            
                            <div class="h-coupon-extra">
                                <?php if(!empty(echoOutput($item['coupon_expire']))): ?>
                                    <span><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($item['coupon_expire']); ?></span>
                                <?php endif; ?>
                                <?php if(isVerified(echoOutput($item['coupon_verify']))): ?>
                                    <span class="uk-margin-small-left"><i class="ti ti-check uk-text-success"></i> <?php echo echoOutput($translation['tr_26']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="h-coupon-right">
                        <?php if(isExclusive(echoOutput($item['coupon_exclusive']))): ?>
                            <div class="vch-ribbon">
                                <span><?php echo echoOutput($translation['tr_16']); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <a class="h-coupon-btn c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo echoOutput($item['coupon_link']); ?>">
                            <?php echo echoOutput($translation['tr_22']); ?> <i class="ti ti-chevron-right"></i>
                        </a>
                    </div>
                </div>

                <div class="h-coupon-details-box" id="toggle_<?php echo echoOutput($item['coupon_id']); ?>" hidden>
                    <p class="uk-margin-remove"><?php echo echoOutput($item['coupon_description']); ?></p>
                </div>

                <div class="h-coupon-footer">
                    <a href="<?php echo $urlPath->store($item['store_slug']); ?>">
                        <?php echo echoOutput($translation['tr_21']); ?> <?php echo echoOutput($item['store_title']); ?> <?php echo echoOutput($translation['tr_16'] ?? 'vouchers'); ?>
                    </a>
                </div>
            </div>

            <?php endforeach; ?>

            </div>

            <?php require './sections/pagination.php'; ?>
            
            <?php endif; ?>

            <?php if(empty($items)): ?>
                <div class="uk-width-1-1 uk-flex uk-flex-center uk-text-center uk-margin-large-top">
                <div class="uk-width-1-1 uk-width-1-2@s">
                <h3 class="uk-text-bold uk-margin-small"><?php echo echoOutput($translation['tr_109']); ?></h3>
                <p class="uk-margin-small"><?php echo echoOutput($translation['tr_110']); ?></p>
                </div>
                </div>
            <?php endif; ?>

        
        </div>
        <!-- END CONTENT -->

    <div>
</div>
</div>

<?php require './sections/views/search-modal.view.php'; ?>
