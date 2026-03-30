<div class="uk-container uk-margin-large-top uk-margin-large-bottom" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<div class="tas_heading uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
        <div class="uk-width-expand">
            <h3 class="uk-heading-line uk-text-left"><span><?php echo echoOutput($translation['tr_13']); ?></span></h3>
        </div>
        <div class="uk-width-auto">
            <a href="#" class="uk-button uk-button-default uk-border-pill btn">
                <?php echo echoOutput($translation['tr_21']); ?>
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
    </div>

        <div class="uk-grid-medium uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>

<?php foreach($latestCoupons as $item): ?>

<div class="tas_card_5">
    <div class="uk-grid-collapse card" uk-grid>
        <div class="left uk-width-auto uk-flex uk-flex-middle">

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
        <div class="body uk-width-expand uk-flex uk-flex-middle">
        <div class="uk-grid-collapse uk-flex uk-flex-middle" uk-grid>

            <div class="uk-width-expand uk-width-medium">
                <?php if(timeLeft(echoOutput($item['coupon_expire']))): ?>
                <p class="tas_time"><i class="ti ti-clock"></i> <span><?php echo timeLeft(echoOutput($item['coupon_expire'])); ?></span></p>
                <?php endif; ?>
                <h3 class="title"><?php echo echoOutput($item['coupon_title']); ?></h3>
            </div>
            <div class="uk-width-auto">
                <a class="uk-button btn c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>" href="#">
                <?php echo echoOutput($translation['tr_22']); ?>
                </a>
            </div>

        </div>

        </div>

        <div class="uk-width-1-1 info">

        <ul class="uk-subnav" uk-margin>
            <?php if(!empty(echoOutput($item['coupon_expire']))): ?>
            <li><span><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($item['coupon_expire']); ?></span></li>
            <?php endif; ?>
            <?php if(isVerified(echoOutput($item['coupon_verify']))): ?>
            <li><span><div class="verified"><i class="ti ti-check"></i> <?php echo echoOutput($translation['tr_26']); ?></div></span></li>
            <?php endif; ?>
        </ul>

        </div>

    </div>
</div>

<?php endforeach; ?>

</div>
</div>