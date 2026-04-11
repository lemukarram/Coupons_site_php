<!-- Section: Long Text with Image -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <h2 class="uk-heading-divider uk-text-center uk-margin-large-bottom"><?php echo echoOutput($section_long_text['section_title']); ?></h2>
        <div uk-grid>
            <div class="uk-width-1-1 uk-width-7-10@m">
                <div class="section-content-top uk-text-secondary">
                    <?php echo parseCustomTags($section_long_text['section_description']); ?>
                </div>
            </div>
            <div class="uk-width-1-1 uk-width-3-10@m">
                <?php if($section_long_text['section_image']): ?>
                <img src="<?php echo $urlPath->image($section_long_text['section_image']); ?>" alt="<?php echo echoOutput($section_long_text['section_title']); ?>" class="uk-border-rounded uk-box-shadow-medium">
                <?php endif; ?>
            </div>
            <div class="uk-width-1-1 uk-margin-top">
                <div class="section-content-bottom uk-text-secondary">
                    <?php echo parseCustomTags($section_long_text['section_content']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
