<!-- Section: About Us (70/30) -->
<div class="uk-section uk-section-muted">
    <div class="uk-container">
        <div class="uk-grid-large uk-flex-middle" uk-grid>
            <div class="uk-width-2-3@m">
                <h2 class="uk-text-bold uk-text-primary"><?php echo echoOutput($section_about_us['section_title']); ?></h2>
                <div class="uk-text-lead uk-text-secondary">
                    <?php echo parseCustomTags($section_about_us['section_description']); ?>
                </div>
            </div>
            <div class="uk-width-1-3@m uk-text-center">
                <?php if($section_about_us['section_image']): ?>
                <img src="<?php echo $urlPath->image($section_about_us['section_image']); ?>" alt="About Us Graphics" class="uk-responsive-width uk-border-rounded">
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
