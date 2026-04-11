<!-- Section 2: Long Text with Image -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-heading-divider uk-text-center uk-margin-large-bottom"><?php echo echoOutput($section_long_text['section_title']); ?></h2>
        <div uk-grid>
            <div class="uk-width-1-1 uk-width-7-10@m">
                <div class="section-content-top">
                    <?php echo parseCustomTags($section_long_text['section_description']); ?>
                </div>
            </div>
            <div class="uk-width-1-1 uk-width-3-10@m">
                <?php if($section_long_text['section_image']): ?>
                <img src="<?php echo $urlPath->image($section_long_text['section_image']); ?>" alt="<?php echo echoOutput($section_long_text['section_title']); ?>" class="uk-border-rounded uk-box-shadow-medium">
                <?php endif; ?>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="section-content-bottom">
                    <?php echo parseCustomTags($section_long_text['section_content']); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section 3: About Us (50/50) -->
<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-grid-large uk-child-width-1-2@m uk-flex-middle" uk-grid>
            <div>
                <h2 class="uk-text-bold"><?php echo echoOutput($section_about_us['section_title']); ?></h2>
                <div class="uk-text-lead uk-margin-medium-bottom">
                    <?php echo parseCustomTags($section_about_us['section_description']); ?>
                </div>
            </div>
            <div class="uk-text-center">
                <?php if($section_about_us['section_image']): ?>
                <img src="<?php echo $urlPath->image($section_about_us['section_image']); ?>" alt="About Us Graphics" class="uk-responsive-width">
                <?php else: ?>
                <div class="uk-background-secondary uk-padding-large uk-light uk-border-rounded">
                    <i class="ti ti-info-circle uk-text-primary" style="font-size: 80px;"></i>
                    <h3>Visual Graphics Placeholder</h3>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Section 4: How to use Coupons (3 steps) -->
<div class="uk-section uk-section-default">
    <div class="uk-container uk-text-center">
        <h2 class="uk-text-bold"><?php echo echoOutput($section_how_to_use['section_title']); ?></h2>
        <p class="uk-text-muted uk-margin-large-bottom"><?php echo echoOutput($section_how_to_use['section_description']); ?></p>
        
        <div class="uk-grid-divider uk-child-width-1-3@m" uk-grid>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step1_icon'] ?: 'search'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title"><?php echo echoOutput($section_how_to_use['step1_title'] ?: 'Find a store'); ?></h3>
                    <p>Browse through our extensive list of stores to find your favorite brands.</p>
                </div>
            </div>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step2_icon'] ?: 'ticket'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title"><?php echo echoOutput($section_how_to_use['step2_title'] ?: 'Receive Coupon'); ?></h3>
                    <p>Click on the coupon to reveal the code or deal and copy it to your clipboard.</p>
                </div>
            </div>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step3_icon'] ?: 'shopping-cart'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title"><?php echo echoOutput($section_how_to_use['step3_title'] ?: 'Take Advantage'); ?></h3>
                    <p>Apply the code at checkout and enjoy your exclusive discount!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section 5: Subscription (Dark Mode) -->
<div class="uk-section uk-background-cover uk-light uk-flex uk-flex-center uk-flex-middle" 
     style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo $urlPath->image($section_subscribe['section_image'] ?: 'slider_1635355430.jpg'); ?>); min-height: 400px;">
    <div class="uk-container uk-text-center">
        <h2 class="uk-heading-small uk-text-bold"><?php echo echoOutput($section_subscribe['section_title']); ?></h2>
        <p class="uk-text-lead uk-margin-large-bottom"><?php echo echoOutput($section_subscribe['section_description']); ?></p>
        
        <div class="uk-flex uk-flex-center">
            <form class="uk-grid-small uk-width-xlarge" uk-grid>
                <div class="uk-width-expand@s">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input class="uk-input uk-form-large uk-border-pill" type="email" id="subscriber_email_alt" placeholder="<?php echo echoOutput($translation['tr_46']); ?>">
                    </div>
                </div>
                <div class="uk-width-auto@s">
                    <button class="uk-button uk-button-primary uk-button-large uk-border-pill" type="submit" id="submit-subscriber-alt">
                        <?php echo echoOutput($translation['tr_45']); ?>
                    </button>
                </div>
            </form>
        </div>
        <div id="showresults-alt" class="uk-margin-top"></div>
    </div>
</div>
