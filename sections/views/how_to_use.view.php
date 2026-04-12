<!-- Section: How to use Coupons (3 steps) -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-large-bottom">
            <h2 class="uk-text-bold uk-text-primary"><?php echo echoOutput($section_how_to_use['section_title']); ?></h2>
            <p class="uk-text-muted uk-text-lead"><?php echo echoOutput($section_how_to_use['section_description']); ?></p>
        </div>
        
        <div class="how-to-use-section uk-grid-large uk-child-width-1-3@m" uk-grid>
            <!-- Step 1 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded uk-text-center uk-transition-toggle" tabindex="0">
                    <div class="uk-position-top-center uk-margin-small-top">
                        <span class="uk-icon-button uk-button-primary" >
                            <i class="ti ti-<?php echo $section_how_to_use['step1_icon'] ?: 'search'; ?>" style="font-size: 35px;"></i>
                        </span>
                    </div>
                    
                    <h3 class="uk-card-title uk-text-bold uk-margin-small-bottom"><?php echo echoOutput($section_how_to_use['step1_title'] ?: 'Find a store'); ?></h3>
                    <p class="uk-text-secondary">Browse through our extensive list of stores to find your favorite brands and retailers.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded uk-text-center uk-transition-toggle" tabindex="0">
                    <div class="uk-position-top-center uk-margin-small-top">
                        <span class="uk-badge uk-padding-small" style="background: var(--primary-color); position: absolute; top: -15px; left: 50%; transform: translateX(-50%); font-size: 1.2rem; height: 35px; min-width: 35px; border-radius: 50%;">2</span>
                    </div>
                    <div class="uk-margin-medium-top uk-margin-bottom uk-transition-scale-up uk-transition-opaque">
                        <span class="uk-icon-button uk-button-primary" style="width: 70px; height: 70px; background: rgba(var(--primary-color-rgb), 0.1); color: var(--primary-color); border: 1px solid var(--primary-color);">
                            <i class="ti ti-<?php echo $section_how_to_use['step2_icon'] ?: 'ticket'; ?>" style="font-size: 35px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title uk-text-bold uk-margin-small-bottom"><?php echo echoOutput($section_how_to_use['step2_title'] ?: 'Receive Coupon'); ?></h3>
                    <p class="uk-text-secondary">Select the coupon you want to use and either reveal the code or claim the direct deal.</p>
                </div>
            </div>

            <!-- Step 3 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded uk-text-center uk-transition-toggle" tabindex="0">
                    <div class="uk-position-top-center uk-margin-small-top">
                        <span class="uk-badge uk-padding-small" style="background: var(--primary-color); position: absolute; top: -15px; left: 50%; transform: translateX(-50%); font-size: 1.2rem; height: 35px; min-width: 35px; border-radius: 50%;">3</span>
                    </div>
                    <div class="uk-margin-medium-top uk-margin-bottom uk-transition-scale-up uk-transition-opaque">
                        <span class="uk-icon-button uk-button-primary" style="width: 70px; height: 70px; background: rgba(var(--primary-color-rgb), 0.1); color: var(--primary-color); border: 1px solid var(--primary-color);">
                            <i class="ti ti-<?php echo $section_how_to_use['step3_icon'] ?: 'shopping-cart'; ?>" style="font-size: 35px;"></i>
                        </span>
                    </div>
                    <h3 class="uk-card-title uk-text-bold uk-margin-small-bottom"><?php echo echoOutput($section_how_to_use['step3_title'] ?: 'Take Advantage'); ?></h3>
                    <p class="uk-text-secondary">Apply the discount code at checkout to enjoy your savings and exclusive offers!</p>
                </div>
            </div>
        </div>
    </div>
</div>
