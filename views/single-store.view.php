
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