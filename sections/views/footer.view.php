<div class="uk-container uk-margin-large-top">
<hr>
</div>

<div class="tas-footer uk-background-secondary uk-light">
    <div class="uk-container">
        <div class="tas-widgets uk-grid-large uk-padding-large uk-padding-remove-horizontal" uk-grid>
            <!-- Column 1: About Us -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-4@m">
                <h4 class="tas-title uk-text-bold"><?php echo echoOutput($footer_about['section_title']); ?></h4>
                <p class="tas-about"><?php echo echoOutput($footer_about['section_description']); ?></p>
            </div>
            
            <!-- Column 2: Service -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-4@m">
                <h4 class="tas-title uk-text-bold"><?php echo echoOutput($footer_service_title['section_title']); ?></h4>
                <ul class="uk-list uk-list-collapse">
                    <?php foreach(array_slice($navigationFooter, 0, 4) as $item): ?>
                    <li>
                        <a href="<?php echo ($item['navigation_type'] == 'custom' ? ($item['navigation_url'] == '/' ? $urlPath->home() : $item['navigation_url']) : $urlPath->page($item['navigation_url'])); ?>" target="<?php echo $item['navigation_target']; ?>" class="uk-link-muted">
                            <?php echo echoOutput($item['navigation_label']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 3: Like us on (Social Media) -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-4@m">
                <h4 class="tas-title uk-text-bold"><?php echo echoOutput($footer_like_us_title['section_title']); ?></h4>
                <ul class="tas-follow uk-iconnav">
                    <?php foreach($socialMedia as $item): ?>
                        <?php if (!empty($item['st_facebook'])): ?>
                        <li><a href="<?php echo $item['st_facebook'] ?>" uk-icon="icon: facebook" class="uk-icon-button"></a></li>
                        <?php endif;?>
                        <?php if (!empty($item['st_twitter'])): ?>
                        <li><a href="<?php echo $item['st_twitter'] ?>" uk-icon="icon: twitter" class="uk-icon-button "></a></li>
                        <?php endif;?> 
                        <?php if (!empty($item['st_youtube'])): ?>
                        <li><a href="<?php echo $item['st_youtube'] ?>" uk-icon="icon: youtube" class="uk-icon-button "></a></li>
                        <?php endif;?>
                        <?php if (!empty($item['st_linkedin'])): ?>
                        <li><a href="<?php echo $item['st_linkedin'] ?>" uk-icon="icon: linkedin" class="uk-icon-button "></a></li>
                        <?php endif;?>
                        <?php if (!empty($item['st_instagram'])): ?>
                        <li><a href="<?php echo $item['st_instagram'] ?>" uk-icon="icon: instagram" class="uk-icon-button "></a></li>
                        <?php endif;?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Column 4: Pursue -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-width-1-4@m">
                <h4 class="tas-title uk-text-bold"><?php echo echoOutput($footer_pursue_title['section_title']); ?></h4>
                <ul class="uk-list uk-list-collapse">
                    <?php foreach(array_slice($navigationFooter, 4, 4) as $item): ?>
                    <li>
                        <a href="<?php echo ($item['navigation_type'] == 'custom' ? ($item['navigation_url'] == '/' ? $urlPath->home() : $item['navigation_url']) : $urlPath->page($item['navigation_url'])); ?>" target="<?php echo $item['navigation_target']; ?>" class="uk-link-muted">
                            <?php echo echoOutput($item['navigation_label']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div> 

    <div class="tas-copyright uk-padding-small uk-background-secondary uk-border-top" style="border-top-color: rgba(255,255,255,0.1) !important;">
        <div class="uk-container">
            <div uk-grid>
                <div class="uk-width-1-1 uk-text-center">
                    <small><?php echo echoOutput($translation['tr_47']); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>
