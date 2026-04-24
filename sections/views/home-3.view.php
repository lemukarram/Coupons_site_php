<div class="tas_home_3 uk-container uk-margin-small-top uk-margin-small-bottom">

    <div uk-grid>

        <div class="uk-width-auto uk-visible@s">
            <div class="menu" style="padding: 10px 0;">
            <?php foreach(array_slice($menuCategories, 0, 5) as $item): ?>

                <div class="uk-grid-small uk-flex-middle" uk-grid style="margin-bottom: 8px;">
                        <a href="<?php echo $urlPath->search(['category' => $item['category_slug']]); ?>" class="title" style="font-size: 0.9rem; padding: 5px 15px;">
                        <i class="<?php echo getIcon($item['category_icon']); ?> icon" style="font-size: 1.1rem;"></i>
                        <?php echo echoOutput($item['category_title']); ?></a>
                </div>

            <?php endforeach; ?>
            </div>
        </div>

        <div class="uk-width-expand">

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: fade; ratio: 8:3">

                    <ul class="uk-slideshow-items" style="min-height: 250px;">
                    <?php foreach($getSliders as $item): ?>
                        <li>
                            <a href="<?php echo echoOutput($item['slider_link']); ?>">
                            <img src="<?php echo $urlPath->image(echoOutput($item['slider_image'])); ?>" alt="<?php echo echoOutput($item['slider_link']); ?>" uk-cover>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover nextprevbtn" href="#" uk-slidenav-previous uk-slideshow-item="previous"><i class="ti ti-chevron-left"></i></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover nextprevbtn" href="#" uk-slidenav-next uk-slideshow-item="next"><i class="ti ti-chevron-right"></i></a>

            </div>

        </div>


    </div>

</div>