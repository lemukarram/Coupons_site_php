<!-- Section: Subscription (Dark Mode) -->
<div class="uk-section subscribe-section uk-background-cover uk-light uk-flex uk-flex-center uk-flex-middle" 
     style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(<?php echo $urlPath->image($section_subscribe['section_image'] ?: 'slider_1635355430.jpg'); ?>); min-height: 300px; padding: 40px 20px;">
    <div class="uk-container uk-text-center" style="max-width: 100%;">
        <h2 class="uk-heading-small uk-text-bold uk-margin-small-bottom" style="font-size: 2rem;"><?php echo echoOutput($section_subscribe['section_title']); ?></h2>
        <p class="uk-text-lead uk-margin-medium-bottom" style="font-size: 1.1rem;"><?php echo echoOutput($section_subscribe['section_description']); ?></p>
        
        <div class="uk-flex uk-flex-center">
            <form class="uk-grid-collapse uk-width-xlarge uk-width-1-1@s" uk-grid style="max-width: 100%;">
                <div class="uk-width-expand@s uk-width-1-1">
                    <div class="uk-inline uk-width-1-1">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input class="uk-input uk-form-large uk-text-secondary" type="email" id="subscriber_email_alt" placeholder="<?php echo echoOutput($translation['tr_46']); ?>">
                    </div>
                </div>
                <div class="uk-width-auto@s uk-width-1-1">
                    <button class="uk-button uk-button-primary uk-button-large uk-width-1-1 uk-width-auto@s" type="submit" id="submit-subscriber-alt">
                        <?php echo echoOutput($translation['tr_45']); ?>
                    </button>
                </div>
            </form>
        </div>
        <div id="showresults-alt" class="uk-margin-top"></div>
    </div>
</div>
