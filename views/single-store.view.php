<?php require './sections/header.php'; ?>

<div class="cat-banner">
    <div class="uk-container">
        <div class="cat-banner-grid">
            <div class="cat-banner-img">
                <div class="uk-cover-container uk-border-rounded" style="width: 100%; height: 250px;">
                    <img src="<?php echo $urlPath->image($itemDetails['store_image']); ?>" alt="<?php echo echoOutput($itemDetails['store_title']); ?>" uk-cover>
                </div>
            </div>
            <div class="cat-banner-content">
                <div class="breadcrumb">
                    <a href="<?php echo $urlPath->home(); ?>"><?php echo echoOutput($translation['tr_1']); ?></a> » 
                    <a href="<?php echo $urlPath->stores(); ?>"><?php echo echoOutput($translation['tr_116']); ?></a> » 
                    <span><?php echo echoOutput($itemDetails['store_title']); ?></span>
                </div>
                <h1><?php echo echoOutput($itemDetails['store_title']); ?></h1>
                <div class="description">
                    <?php echo echoOutput($itemDetails['store_description']); ?>
                </div>

                <div class="uk-margin-top">
                    <form class="uk-form" method="post" id="formRating">
                        <input value="<?php echo echoOutput($itemDetails['store_id']); ?>" name="item" type="text" hidden>
                        <select id="rating-form" name="rating" data-current="<?php echo echoOutput(!$itemDetails['rating'] ? 5 : $itemDetails['rating']); ?>">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <p class="uk-text-muted uk-text-small"><?php echo echoOutput($itemDetails['total_reviews']); ?> <?php echo echoOutput($translation['tr_117']); ?> <?php echo echoOutput(number_format($itemDetails['rating'], 2)); ?> <?php echo echoOutput($translation['tr_118']); ?></p>
                        <div id="showReviewresults"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="uk-container page uk-margin-medium-top">
    <div class="uk-grid-large" uk-grid>

        <!-- SIDEBAR -->
        <div class="uk-width-1-1 uk-width-1-4@m sidebar uk-visible@m">
            <?php 
                $getCategories = getCategories($connect);
                $getStores = getStores($connect, 20);
                require './sections/views/search-form.view.php'; 
            ?>
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

            <div class="uk-margin-medium-top">
                <h3 class="uk-text-bold uk-margin-bottom"><?php echo echoOutput($itemDetails['store_title']); ?> <?php echo echoOutput($translation['tr_91']); ?> for <?php echo date('F Y'); ?></h3>
                
                <?php if(!empty($items)): ?>
                    <div class="uk-grid-medium uk-child-width-1-1" uk-grid>
                        <?php foreach($items as $item): ?>
                        <div class="h-coupon-item">
                            <div class="h-coupon-card">
                                <?php 
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
                                        <div class="vch-ribbon exclusive-store">
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
