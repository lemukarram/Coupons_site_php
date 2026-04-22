<div class="uk-container uk-margin-large-top uk-margin-large-bottom" uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 100">

<div class="tas_heading uk-grid-collapse uk-flex uk-flex-middle uk-margin-medium-bottom" uk-grid>
        <div class="uk-width-expand">
            <h3 class="uk-heading-line uk-text-left"><span><?php echo echoOutput($translation['tr_34']); ?></span></h3>
        </div>
        <div class="uk-width-auto">
            <a href="<?php echo $urlPath->stores(); ?>" class="uk-button uk-button-default uk-border-pill btn">
                <?php echo echoOutput($translation['tr_21']); ?>
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
    </div>

    <div class="uk-grid-small uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-6@l" uk-grid>
    <?php foreach($featuredStores as $item): ?>
        <div class="cat_3 uk-text-center" style="margin-bottom: 24px !important;">
            <a href="<?php echo $urlPath->store($item['store_slug']); ?>">
                <div class="cover uk-border-rounded uk-flex uk-flex-middle uk-flex-center" style="background-color: <?php echo getStoreBackgroundColor($item['store_id']); ?>; height: 80px;">
                    <img src="<?php echo $urlPath->image($item['store_image']); ?>" alt="<?php echo echoOutput($item['store_title']); ?>" style="object-fit: cover;border-radius: 5px; width: 100%; max-height: 80px;">
                </div>
                <h2 class="title uk-margin-small-top"><?php echo echoOutput($item['store_title']); ?></h2>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>