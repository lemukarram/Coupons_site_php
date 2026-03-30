<div class="uk-width-1-1 share_box">

<h6 class="uk-margin-small-bottom uk-text-center uk-text-left@s"><?php echo echoOutput($translation['tr_50']); ?></h6>

<div class="uk-grid-small uk-child-width-1-6 uk-text-center" uk-grid>

<div>
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>" target="_blank" rel="noopener" aria-label="Facebook">
<div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-facebook"></i></div></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=<?php echo echoOutput($couponDetails['coupon_title']); ?>&amp;url=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>" target="_blank" rel="noopener" aria-label="Twitter">
<div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-twitter"></i></div></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo echoOutput($couponDetails['coupon_title']); ?>&amp;caption=<?php echo echoOutput($couponDetails['coupon_title']); ?>&amp;content=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>&amp;canonicalUrl=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="Tumblr">
<div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-tumblr"></i></div></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>&amp;media=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>&amp;description=<?php echo echoOutput($couponDetails['coupon_title']); ?>" target="_blank" rel="noopener" aria-label="Pinterest">
<div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-pinterest"></i></div></div>
</a>
</div>

<div>
<a class="resp-sharing-button__link" href="whatsapp://send?text=<?php echo echoOutput($couponDetails['coupon_title']); ?>%20<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
<div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-whatsapp"></i></div></div>
</a>
</div>

<div>

<a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=<?php echo echoOutput($couponDetails['coupon_title']); ?>&amp;url=<?php echo $urlPath->sharelink($couponDetails['store_slug'], $couponDetails['coupon_id']); ?>" target="_blank" rel="noopener" aria-label="Share on Telegram">
<div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
<i class="ti ti-brand-telegram"></i></div></div>
</a>

</div>
</div>
</div>