<?php if(getCodeParams()): ?>

<div class="uk-open" id="singleModal" uk-modal style="display: block;" tabindex="-1">
<div class="tas-modal coupon-modal uk-modal-dialog uk-modal-body">
<button class="uk-modal-close-default c-close" type="button" uk-close></button>

<?php if(empty($couponDetails)):  ?>
    <?php echo echoOutput($translation['tr_37']); ?>
<?php endif; ?>

<?php if(!empty($couponDetails)):  ?>

    <!-- -->

    <div class="uk-text-center">
        <?php if(!empty($couponDetails['coupon_code'])):  ?>
            <img class="image" src="<?php echo $urlPath->image($couponDetails['store_image']); ?>">
            <h2 class="title"><?php echo echoOutput($couponDetails['coupon_title']); ?></h2>
            <p><?php echo echoOutput($translation['tr_23']); ?> <a href="<?php echo $urlPath->redirect($couponDetails['coupon_id']); ?>" target="_blank"><?php echo echoOutput($couponDetails['store_title']); ?></a></p>

            <div class="coupon">
            <div><p class="uk-text-secondary uk-text-bold"><?php echo echoOutput($couponDetails['coupon_code']); ?></p></div>
            <div><a class="uk-button uk-button-primary uk-border-pill uk-text-bold copy" data-clipboard-text="<?php echo echoOutput($couponDetails['coupon_code']); ?>" data-copy="<?php echo echoOutput($translation['tr_87']); ?>" data-copied="<?php echo echoOutput($translation['tr_119']); ?>"><?php echo echoOutput($translation['tr_87']); ?></a></div>
            </div>

            <?php if(isset($isLike)): ?>
            
                <?php if($isLike == 0): ?>
                
                    <div class="uk-grid-small uk-flex uk-flex-middle uk-flex-center likes" uk-grid>

                <div><p class="uk-text-small"><?php echo echoOutput($translation['tr_204']); ?></p></div>
                <div>

                    <a class="deslike coupon_deslike uk-text-secondary" data-item="<?php echo echoOutput($couponDetails['coupon_id']); ?>"><i class="ti ti-mood-sad"></i> <?php echo echoOutput($translation['tr_206']); ?></a>
                    <a class="like coupon_like uk-text-secondary" data-item="<?php echo echoOutput($couponDetails['coupon_id']); ?>"><i class="ti ti-mood-smile"></i> <?php echo echoOutput($translation['tr_205']); ?></a>

                </div>

                </div>
                <?php endif; ?>

                <p class="uk-text-small thanks uk-hidden"><?php echo echoOutput($translation['tr_207']); ?></p>

                <?php if($isLike == 1): ?>
                <p class="uk-text-small"><?php echo echoOutput($translation['tr_207']); ?></p>
                <?php endif; ?>

            <?php endif; ?>




        <?php endif; ?>

    <!-- -->

        <?php if(empty($couponDetails['coupon_code'])):  ?>
            <img class="image" src="<?php echo $urlPath->image($couponDetails['store_image']); ?>">
            <h2 class="title"><?php echo echoOutput($couponDetails['coupon_title']); ?></h2>
            <p class="uk-margin-remove-top"><?php echo echoOutput($translation['tr_89']); ?></p>
            <a href="<?php echo $urlPath->redirect($couponDetails['coupon_id']); ?>" target="_blank" class="uk-button uk-button-primary uk-border-pill uk-text-bold"><?php echo echoOutput($translation['tr_98']); ?></a>
        <?php endif; ?>

    </div>

    <!-- -->

    <hr>
    <?php if(!empty($couponDetails['coupon_expire'])): ?>
    <p class="uk-margin-remove uk-text-secondary uk-text-small"><?php echo echoOutput($translation['tr_99']); ?></p>
    <p class="uk-margin-remove uk-text-small"><?php echo echoOutput($translation['tr_24']); ?> <?php echo formatDate($couponDetails['coupon_expire']); ?></p>
    <?php endif; ?>
    <p class="uk-margin-small-top uk-text-small"><?php echo echoOutput($couponDetails['coupon_description']); ?></p>
    
    <hr>
    
    <?php require './sections/views/share.view.php'; ?>

<?php endif; ?>

<?php if(!empty($modalAD)): ?>
    <hr>
    <?php echo $modalAD['ad_html']; ?>
<?php endif; ?>

</div>
</div>

<?php endif; ?>
