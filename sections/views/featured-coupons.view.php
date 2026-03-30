<div class="uk-container uk-margin-large-top uk-margin-large-bottom" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

    <div class="tas_heading uk-grid-collapse uk-flex uk-flex-middle" uk-grid>
        <div class="uk-width-expand">
            <h3 class="uk-heading-line uk-text-left"><span><?php echo echoOutput($translation['tr_6']); ?></span></h3>
        </div>
        <div class="uk-width-auto">
            <a href="<?php echo $urlPath->search(); ?>" class="uk-button uk-button-default uk-border-pill btn">
                <?php echo echoOutput($translation['tr_21']); ?>
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
    </div>

        <div class="uk-grid-medium uk-grid-match uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>

<?php foreach($featuredCoupons as $item): ?>

        <div class="tas_card_6">

        <div class="uk-card uk-card-default uk-border-rounded">
        <div class="uk-card-media-top uk-cover-container">
                <a class="c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>" href="#">
                <img src="<?php echo $urlPath->image($item['coupon_image']); ?>" alt="<?php echo echoOutput($item['coupon_title']); ?>" uk-cover>
                </a>

                <?php if(timeLeft(echoOutput($item['coupon_expire']))): ?>
            <div class="uk-overlay tas_time uk-overlay-default uk-position-bottom">
                <p><i class="ti ti-clock"></i> <span><?php echo timeLeft(echoOutput($item['coupon_expire'])); ?></span></p>
            </div>
            <?php endif; ?>

        </div>
                    
            <div class="uk-card-body">

                <?php if(isNew($item['coupon_start'])): ?>
                <div class="new"><?php echo echoOutput($translation['tr_20']); ?></div>
                <?php endif; ?>

                <a class="c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>" href="#">
                <h2 class="uk-card-title uk-text-truncate"><?php echo echoOutput($item['coupon_title']); ?></h2>
                </a>

                <div class="uk-grid-collapse uk-child-width-1-2 info" uk-grid>

            <?php if(!empty(echoOutput($item['coupon_expire']))): ?>
            <div class="uk-text-left"><span class="uk-text-muted"><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($item['coupon_expire']); ?></span></div>
            <?php endif; ?>

            <?php if(isVerified(echoOutput($item['coupon_verify']))): ?>
            <div class="uk-text-left"><span><div class="verified"><i class="ti ti-check"></i> <?php echo echoOutput($translation['tr_26']); ?></div></span></div>
            <?php endif; ?>

                </div>

            <a class="uk-button uk-width-1-1 btn c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo echoOutput($item['coupon_link']); ?>" href="#">
            <?php echo echoOutput($translation['tr_22']); ?>
            </a>

            </div>
        </div>
        </div>

<?php endforeach; ?>

</div>
</div>