<div class="uk-container uk-margin-top uk-margin-large-bottom vch-exclusive-section">

    <style>
        @media (max-width: 640px) {
            .vch-exclusive-section {
                padding-left: 20px;
                padding-right: 20px;
                margin-top: 25px !important;
                margin-bottom: 25px !important;
            }
        }
    </style>

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

    <div class="vch-coupon-grid">

        <?php foreach($exclusiveCoupons as $item): ?>

        <div class="vch-coupon-wrap">
            <div class="vch-coupon-card">

                <?php if(isExclusive(echoOutput($item['coupon_exclusive']))): ?>
                    <div class="vch-ribbon">
                        <span><?php echo echoOutput($translation['tr_16']); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Logo / Image -->
                <a class="c-open vch-logo-wrap" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>" href="#">
                    <img src="<?php echo $urlPath->image(fixImg($item['coupon_image'] ? $item['coupon_image'] : $item['store_image'])); ?>" alt="<?php echo echoOutput($item['coupon_title']); ?>" class="vch-logo-img">
                </a>

                <!-- Description -->
                <a class="c-open vch-description" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>" href="#">
                    <?php echo echoOutput($item['coupon_title']); ?>
                </a>

                <!-- Dashed divider with scissors -->
                <div class="vch-divider">
                    <span class="vch-scissors">✂</span>
                </div>

                <!-- Go to Code -->
                <a class="c-open vch-go-code" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo echoOutput($item['coupon_link']); ?>" href="#">
                    <?php echo echoOutput($translation['tr_22']); ?> <span class="vch-arrow">❯</span>
                </a>

            </div>

            <!-- Store link below card -->
            <div class="vch-store-link">
                <a href="<?php echo $urlPath->redirect($item['coupon_id']); ?>" class="vch-view-all c-open" data-id="<?php echo echoOutput($item['coupon_id']); ?>" data-redirect="<?php echo $urlPath->redirect($item['coupon_id']); ?>">
                    <?php echo echoOutput($translation['tr_21']); ?> <?php echo echoOutput($item['store_title'] ?? ''); ?> <?php echo echoOutput($translation['tr_16'] ?? 'vouchers'); ?>
                </a>
            </div>
        </div>

        <?php endforeach; ?>

    </div>
</div>