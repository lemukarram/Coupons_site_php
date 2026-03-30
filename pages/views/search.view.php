
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

                <div class="tas_card_5">
        <div class="uk-grid-collapse uk-margin card uk-flex uk-flex-middle" uk-grid>
            <div class="left uk-width-auto">

                <div class="uk-cover-container">
                <?php if($item['store_image']): ?>
                <img src="<?php echo $urlPath->image($item['store_image']); ?>" alt="<?php echo echoOutput($item['coupon_title']); ?>" uk-cover>
                <canvas width="60" height="60"></canvas>
                <?php endif; ?>
                <?php if(!$item['store_image']): ?>
                <div class="no-image"><i class="ti ti-percentage"></i></div>
                <?php endif; ?>

                </div>

            </div>
            <div class="body uk-width-expand">
            <div class="uk-grid-small" uk-grid>

                <div class="uk-width-1-1 uk-width-expand@s">
                    <?php if(timeLeft(echoOutput($item['coupon_expire']))): ?>
                    <p class="tas_time"><i class="ti ti-clock"></i> <span><?php echo timeLeft(echoOutput($item['coupon_expire'])); ?></span></p>
                    <?php endif; ?>
                    <h3 class="title"><?php echo echoOutput($item['coupon_title']); ?></h3>
                <?php if(!empty($item['coupon_tagline'])): ?>
                    <p class="tagline"><?php echo echoOutput($item['coupon_tagline']); ?></p>
                <?php endif; ?>
                </div>
                <div class="uk-width-1-1 uk-width-auto@s">
                    <a class="uk-width-1-1@s uk-button btn c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo echoOutput($item['coupon_link']); ?>">
                    <?php echo echoOutput($translation['tr_22']); ?>
                    </a>
                </div>

            </div>

            </div>

            <div class="uk-width-1-1 info">

            <div class="uk-grid-small uk-flex uk-flex-middle" uk-grid>

            <div class="uk-width-expand uk-text-left">
                <ul class="uk-subnav" uk-margin>
                    <?php if(!empty(echoOutput($item['coupon_expire']))): ?>
                    <li><span><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($item['coupon_expire']); ?></span></li>
                    <?php endif; ?>
                    <?php if(isVerified(echoOutput($item['coupon_verify']))): ?>
                    <li><span><div class="verified"><i class="ti ti-check"></i> <?php echo echoOutput($translation['tr_26']); ?></div></span></li>
                    <?php endif; ?>
                    <?php if(isExclusive(echoOutput($item['coupon_exclusive']))): ?>
                    <li><span><div class="exclusive"><i class="ti ti-crown"></i> <?php echo echoOutput($translation['tr_16']); ?></div></span></li>
                    <?php endif; ?>
                </ul>
            </div>
            
            <div class="uk-width-auto uk-text-right">
                    <a class="see_details" uk-toggle="target: #toggle_<?php echo echoOutput($item['coupon_id']); ?>; animation: uk-animation-fade"><?php echo echoOutput($translation['tr_99']); ?></a>
            </div>

            </div>

            <div class="uk-width-1-1" id="toggle_<?php echo echoOutput($item['coupon_id']); ?>" hidden>
                <p class="details"><?php echo echoOutput($item['coupon_description']); ?></p>
                <hr class="uk-margin-small">
                <p class="uk-margin-remove reaction uk-flex uk-flex-middle">
                    <i class="ti ti-mood-smile uk-text-success"></i> <span><?php echo echoOutput($item['total_likes']); ?></span>
                    <i class="ti ti-mood-sad uk-text-danger"></i> <span><?php echo echoOutput($item['total_deslikes']); ?></span>
                </p>
            </div>

        </div>
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
