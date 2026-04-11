<!-- Section: How to use Coupons (3 steps) -->
<div class="uk-section uk-section-default">
    <div class="uk-container uk-text-center">
        <h2 class="uk-text-bold uk-text-primary"><?php echo echoOutput($section_how_to_use['section_title']); ?></h2>
        <p class="uk-text-muted uk-margin-large-bottom"><?php echo echoOutput($section_how_to_use['section_description']); ?></p>
        
        <div class="uk-grid-divider uk-child-width-1-3@m" uk-grid>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step1_icon'] ?: 'search'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title uk-text-bold"><?php echo echoOutput($section_how_to_use['step1_title'] ?: 'Find a store'); ?></h3>
                    <p class="uk-text-secondary">Browse through our extensive list of stores to find your favorite brands.</p>
                </div>
            </div>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step2_icon'] ?: 'ticket'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title uk-text-bold"><?php echo echoOutput($section_how_to_use['step2_title'] ?: 'Receive Coupon'); ?></h3>
                    <p class="uk-text-secondary">Click on the coupon to reveal the code or deal and copy it to your clipboard.</p>
                </div>
            </div>
            <div class="uk-transition-toggle" tabindex="0">
                <div class="uk-card uk-card-body uk-transition-scale-up">
                    <div class="uk-margin-bottom">
                        <span class="uk-icon-button uk-button-primary uk-margin-small-bottom" style="width: 80px; height: 80px;">
                            <i class="ti ti-<?php echo $section_how_to_use['step3_icon'] ?: 'shopping-cart'; ?>" style="font-size: 40px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title uk-text-bold"><?php echo echoOutput($section_how_to_use['step3_title'] ?: 'Take Advantage'); ?></h3>
                    <p class="uk-text-secondary">Apply the code at checkout and enjoy your exclusive discount!</p>
                </div>
            </div>
        </div>
    </div>
</div>
