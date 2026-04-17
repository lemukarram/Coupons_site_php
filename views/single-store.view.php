
<?php require './sections/header.php'; ?>

<div class="tas_singlecategory uk-container uk-margin-medium-top">

<div uk-grid>

    <div class="uk-width-1-1 uk-width-1-5@m">

    <div class=" uk-flex uk-flex-middle" uk-grid>

        <div class="uk-width-1-1 uk-width-auto@s">
        <div class="uk-cover-container uk-border-rounded logo-cover">
        <canvas width="250" height="250"></canvas>
        <img src="<?php echo $urlPath->image($itemDetails['store_image']); ?>" alt="<?php echo echoOutput($itemDetails['store_title']); ?>" uk-cover>
        </div>
        </div>

        <div class="uk-width-1-1 uk-width-expand@s">
        <h2 class="uk-text-center uk-text-left@s uk-margin-small-bottom"><?php echo echoOutput($itemDetails['store_title']); ?></h2>
        <p class="uk-text-muted uk-text-small uk-text-center uk-text-left@s uk-margin-remove"><?php echo echoOutput($itemDetails['store_description']); ?></p>
        </div>

    </div>


    <div class="uk-text-center uk-text-left@s">
    
        <h3 class="widget-title"><?php echo echoOutput($translation['tr_115']); ?> <?php echo echoOutput($itemDetails['store_title']); ?></h3>

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

    <div class="uk-width-1-1 uk-width-expand@m">

    <div class="uk-grid-small uk-flex uk-flex-middle" uk-grid>
            <div class="uk-width-expand">
                <h3 class="uk-heading-line uk-text-left uk-text-bold"><span><?php echo echoOutput($itemDetails['store_title']); ?> <?php echo echoOutput($translation['tr_91']); ?></span></h3>
            </div>
            <div class="uk-width-auto">
                <a href="<?php echo $urlPath->search(['store' => $itemDetails['store_slug']]); ?>" class="uk-button uk-button-default uk-border-pill uk-flex uk-flex-middle">
                    <?php echo echoOutput($translation['tr_21']); ?> 
                    <i class="ti ti-chevron-right uk-text-primary"></i>
                </a>
            </div>
        </div>

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
            </div>

            <?php endforeach; ?>

                </div>

                <?php endif; ?>

                <?php if(empty($items)): ?>
                    <div class="uk-width-1-1 uk-flex uk-flex-center uk-text-center uk-margin-large-top">
                    <div class="uk-width-1-1 uk-width-1-2@s">
                    <h4 class="uk-margin-small"><?php echo echoOutput($translation['tr_109']); ?></h4>
                    </div>
                    </div>
                <?php endif; ?>

    </div>
    </div>
    </div>

</div>


<?php require './sections/footer.php'; ?>