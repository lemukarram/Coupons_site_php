<!-- Section: How to use Coupons (3 steps) -->
<div class="uk-section uk-section-default how-to-use-section">
    <div class="uk-container">
        <div class="uk-text-center uk-margin-large-bottom">
            <h2 class="uk-text-bold uk-text-primary"><?php echo echoOutput($section_how_to_use['section_title']); ?></h2>
            <p class="uk-text-muted uk-text-lead"><?php echo echoOutput($section_how_to_use['section_description']); ?></p>
        </div>
        
        <div class="uk-grid-large uk-child-width-1-3@m" uk-grid>
            <!-- Step 1 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded step-card">
                    <div class="step-header">
                        <span class="uk-icon-button uk-button-primary step-icon">
                            <i class="ti ti-<?php echo $section_how_to_use['step1_icon'] ?: 'search'; ?>"></i>
                        </span>
                        <h3 class="uk-card-title uk-text-bold step-title"><?php echo echoOutput($section_how_to_use['step1_title'] ?: 'Find a store'); ?></h3>
                    </div>
                    <div class="step-content">
                        <p class="uk-text-secondary step-text">Browse through our extensive list of stores to find your favorite brands and retailers.</p>
                        <a href="#" class="view-more-link uk-hidden">View more</a>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded step-card">
                    <div class="step-header">
                        <span class="uk-icon-button uk-button-primary step-icon">
                            <i class="ti ti-<?php echo $section_how_to_use['step2_icon'] ?: 'ticket'; ?>"></i>
                        </span>
                        <h3 class="uk-card-title uk-text-bold step-title"><?php echo echoOutput($section_how_to_use['step2_title'] ?: 'Receive Coupon'); ?></h3>
                    </div>
                    <div class="step-content">
                        <p class="uk-text-secondary step-text">Select the coupon you want to use and either reveal the code or claim the direct deal.</p>
                        <a href="#" class="view-more-link uk-hidden">View more</a>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div>
                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-hover-large uk-border-rounded step-card">
                    <div class="step-header">
                        <span class="uk-icon-button uk-button-primary step-icon">
                            <i class="ti ti-<?php echo $section_how_to_use['step3_icon'] ?: 'shopping-cart'; ?>"></i>
                        </span>
                        <h3 class="uk-card-title uk-text-bold step-title"><?php echo echoOutput($section_how_to_use['step3_title'] ?: 'Take Advantage'); ?></h3>
                    </div>
                    <div class="step-content">
                        <p class="uk-text-secondary step-text">Apply the discount code at checkout to enjoy your savings and exclusive offers!</p>
                        <a href="#" class="view-more-link uk-hidden">View more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .step-card {
            text-align: center;
            padding-top: 50px !important;
            position: relative;
        }
        .step-icon {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
        }
        .step-icon i {
            font-size: 25px;
        }
        .step-title {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        
        @media (max-width: 640px) {
            .how-to-use-section {
                padding-top: 25px !important;
                padding-bottom: 25px !important;
            }
            .step-card {
                text-align: left;
                padding: 15px !important;
            }
            .step-header {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .step-icon {
                position: static;
                transform: none;
                margin: 0 15px 0 0;
                flex-shrink: 0;
                width: 40px;
                height: 40px;
            }
            .step-icon i {
                font-size: 20px;
            }
            .step-title {
                margin: 0;
                font-size: 1.1rem;
            }
            .step-text {
                margin: 0;
                font-size: 0.9rem;
            }
            .step-text.truncated {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;  
                overflow: hidden;
            }
            .view-more-link {
                font-size: 0.8rem;
                color: var(--uk-primary-color);
                display: inline-block;
                margin-top: 5px;
            }
            .view-more-link.uk-hidden {
                display: none !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 640) {
                var steps = document.querySelectorAll('.step-card');
                steps.forEach(function(card) {
                    var text = card.querySelector('.step-text');
                    var link = card.querySelector('.view-more-link');
                    
                    text.classList.add('truncated');
                    
                    if (text.scrollHeight > text.clientHeight) {
                        link.classList.remove('uk-hidden');
                    } else {
                        text.classList.remove('truncated');
                    }
                    
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        if (text.classList.contains('truncated')) {
                            text.classList.remove('truncated');
                            link.innerText = 'View less';
                        } else {
                            text.classList.add('truncated');
                            link.innerText = 'View more';
                        }
                    });
                });
            }
        });
    </script>
</div>
