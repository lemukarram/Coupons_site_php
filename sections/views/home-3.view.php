<div class="tas_home_3 uk-container uk-margin-small-top uk-margin-medium-bottom">

    <div class="uk-grid-small" uk-grid uk-grid-match>

        <div class="uk-width-1-4@m uk-visible@s">
            <div class="menu uk-card uk-card-default uk-border-rounded uk-flex uk-flex-column uk-flex-between" style="padding: 12px; background: #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid #e5e5e5; height: 300px; box-sizing: border-box;">
                <div class="uk-flex-1">
                    <?php foreach(array_slice($menuCategories, 0, 6) as $item): ?>
                        <div class="uk-margin-remove-bottom">
                            <a href="<?php echo $urlPath->search(['category' => $item['category_slug']]); ?>" class="cat-link uk-flex uk-flex-middle" style="font-size: 0.85rem; padding: 8px 12px; color: #333; text-decoration: none; border-radius: 6px; transition: all 0.3s ease;">
                                <i class="<?php echo getIcon($item['category_icon']); ?> icon" style="font-size: 1.1rem; margin-right: 12px; color: var(--uk-primary-color); width: 20px; text-align: center;"></i>
                                <span class="uk-text-truncate" style="font-weight: 400;"><?php echo echoOutput($item['category_title']); ?></span>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid #eee;">
                    <a href="<?php echo $urlPath->categories(); ?>" class="cat-link all-cats uk-flex uk-flex-middle" style="font-size: 0.85rem; padding: 8px 12px; color: var(--primary-color); font-weight: 400; text-decoration: none; border-radius: 6px; transition: all 0.3s ease;">
                        <i class="ti ti-apps icon" style="font-size: 1.1rem; margin-right: 12px; width: 20px; text-align: center;"></i>
                        <?php echo echoOutput($translation['tr_4'] ?? 'All Categories'); ?>
                    </a>
                </div>
            </div>
        </div>

        <div class="uk-width-expand@s">
            <div class="uk-position-relative uk-visible-toggle uk-light uk-border-rounded uk-overflow-hidden shadow-sm" style="height: 300px;" tabindex="-1" uk-slideshow="animation: fade; autoplay: true; ratio: false;">

                    <ul class="uk-slideshow-items" style="height: 300px;">
                    <?php foreach($getSliders as $item): ?>
                        <li>
                            <a href="<?php echo echoOutput($item['slider_link']); ?>">
                                <img src="<?php echo $urlPath->image(echoOutput($item['slider_image'])); ?>" alt="<?php echo echoOutput($item['slider_link']); ?>" uk-cover>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover nextprevbtn" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover nextprevbtn" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                    <ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-center uk-margin-small"></ul>

            </div>
        </div>

    </div>

</div>

<style>
    .tas_home_3 .cat-link:hover {
        background: #f0f4ff;
        color: var(--uk-primary-color) !important;
        transform: translateX(3px);
    }
    .tas_home_3 .all-cats:hover {
        background: var(--uk-primary-color);
        color: #fff !important;
    }
    .tas_home_3 .all-cats:hover i {
        color: #fff !important;
    }
    .tas_home_3 .uk-slideshow-items {
        height: 100% !important;
    }
    .tas_home_3 .nextprevbtn {
        background: rgba(255,255,255,0.2);
        padding: 8px;
        border-radius: 50%;
        color: #fff !important;
        backdrop-filter: blur(5px);
    }
</style>