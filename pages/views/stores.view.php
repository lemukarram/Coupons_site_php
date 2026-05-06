<?php include './sections/page-title.php'; ?>

<div class="uk-container">

<div uk-grid>

<div class="uk-width-1-1 uk-width-expand@m">

    <div class="uk-flex uk-flex-center uk-grid-small" uk-grid>
        <?php foreach ($arrayLetters as $char): ?>
            <a class="uk-link-text" href="#section-<?php echo echoOutput($char); ?>" uk-scroll><?php echo echoOutput($char); ?></a>
        <?php endforeach; ?>
            <a class="uk-link-text" href="#section-09" uk-scroll>0-9</a>
    </div>

    <!-- Search Field -->
    <div class="uk-margin-medium-top uk-margin-medium-bottom">
        <div class="uk-inline uk-width-1-1">
            <span class="uk-form-icon" uk-icon="icon: search"></span>
            <input class="uk-input uk-form-large uk-border-rounded" type="text" id="storeSearchInput" placeholder="Search Stores">
            <button class="uk-button uk-button-primary uk-position-center-right uk-margin-small-right uk-border-rounded uk-visible@s" id="storeSearchBtn">Search Store</button>
        </div>
        <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-top uk-border-rounded uk-hidden@s" id="storeSearchBtnMobile">Search Store</button>
    </div>

    <div class="uk-margin-medium-top uk-margin-bottom">

        <?php foreach ($arrayLetters as $char): ?>
        <h3 class="uk-heading-line uk-text-bold" id="section-<?php echo echoOutput($char); ?>"><span><?php echo echoOutput($char); ?></span></h3>

        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-child-width-1-6@l uk-grid-small" id="grid-<?php echo $char; ?>" uk-grid>
            <?php $getStores = getStoresByLetter($connect, $char); ?>
            <?php $i = 0; foreach($getStores as $item): $i++; ?>
                
                <div class="cat_3 uk-text-center store-card" style="margin-bottom: 50px !important; <?php echo ($i > 20) ? 'display: none;' : ''; ?>" data-title="<?php echo strtolower(echoOutput($item['store_title'])); ?>">
                    <a href="<?php echo $urlPath->store($item['store_slug']); ?>">
                        <div class="cover uk-border-rounded uk-flex uk-flex-middle uk-flex-center" style="background-color: <?php echo getStoreBackgroundColor($item['store_id']); ?>; height: 80px;">
                            <img src="<?php echo $urlPath->image($item['store_image']); ?>" alt="<?php echo echoOutput($item['store_title']); ?>" style="object-fit: cover; max-width: 100%; border-radius: 5px; max-height: 100%;">
                        </div>
                        <h2 class="title uk-margin-small-top uk-text-truncate"><?php echo echoOutput($item['store_title']); ?></h2>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
        <?php if(count($getStores) > 20): ?>
            <div class="uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
                <button class="uk-button uk-button-default uk-border-rounded view-more-btn" data-target="grid-<?php echo $char; ?>">View More</button>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <h3 class="uk-heading-line uk-text-bold" id="section-09"><span>0-9</span></h3>
    <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-child-width-1-6@l uk-grid-small" id="grid-09" uk-grid>
            <?php $getStores = getStoresByLetter($connect); ?>
            <?php $i = 0; foreach($getStores as $item): $i++; ?>
                
                <div class="cat_3 uk-text-center store-card" style="margin-bottom: 50px !important; <?php echo ($i > 20) ? 'display: none;' : ''; ?>" data-title="<?php echo strtolower(echoOutput($item['store_title'])); ?>">
                    <a href="<?php echo $urlPath->store($item['store_slug']); ?>">
                        <div class="cover uk-border-rounded uk-flex uk-flex-middle uk-flex-center" style="background-color: <?php echo getStoreBackgroundColor($item['store_id']); ?>; height: 80px;">
                            <img src="<?php echo $urlPath->image($item['store_image']); ?>" alt="<?php echo echoOutput($item['store_title']); ?>" style="object-fit: cover; width: 100%; height: 100%; border-radius: 5px; max-height: 80px;">
                        </div>
                        <h2 class="title uk-margin-small-top uk-text-truncate"><?php echo echoOutput($item['store_title']); ?></h2>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
        <?php if(count($getStores) > 20): ?>
            <div class="uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
                <button class="uk-button uk-button-default uk-border-rounded view-more-btn" data-target="grid-09">View More</button>
            </div>
        <?php endif; ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // View More functionality
        const viewMoreBtns = document.querySelectorAll('.view-more-btn');
        viewMoreBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const grid = document.getElementById(targetId);
                const hiddenItems = grid.querySelectorAll('.store-card[style*="display: none"]');
                
                for (let i = 0; i < 20 && i < hiddenItems.length; i++) {
                    hiddenItems[i].style.display = 'block';
                }
                
                if (grid.querySelectorAll('.store-card[style*="display: none"]').length === 0) {
                    this.style.display = 'none';
                }
            });
        });

        // Search functionality
        const searchInput = document.getElementById('storeSearchInput');
        const searchBtns = [document.getElementById('storeSearchBtn'), document.getElementById('storeSearchBtnMobile')];
        
        function filterStores() {
            const query = searchInput.value.toLowerCase();
            const storeCards = document.querySelectorAll('.store-card');
            const sections = document.querySelectorAll('.uk-heading-line');
            const viewMoreBtns = document.querySelectorAll('.view-more-btn');

            if (query === '') {
                // Reset to initial state (show first 20 of each section)
                storeCards.forEach(card => card.style.display = 'none');
                sections.forEach(sec => sec.style.display = 'block');
                document.querySelectorAll('[id^="grid-"]').forEach(grid => {
                    const cards = grid.querySelectorAll('.store-card');
                    for (let i = 0; i < 20 && i < cards.length; i++) {
                        cards[i].style.display = 'block';
                    }
                    const btn = document.querySelector(`.view-more-btn[data-target="${grid.id}"]`);
                    if (btn) btn.style.display = cards.length > 20 ? 'inline-block' : 'none';
                });
                return;
            }

            // Hide view more buttons when searching
            viewMoreBtns.forEach(btn => btn.style.display = 'none');

            storeCards.forEach(card => {
                const title = card.getAttribute('data-title');
                if (title.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            // Hide sections that have no visible cards
            sections.forEach(sec => {
                const targetId = sec.id.replace('section-', 'grid-');
                const grid = document.getElementById(targetId);
                if (grid) {
                    const visibleCards = grid.querySelectorAll('.store-card[style="display: block"]');
                    sec.style.display = visibleCards.length > 0 ? 'block' : 'none';
                }
            });
        }

        searchBtns.forEach(btn => {
            if(btn) btn.addEventListener('click', filterStores);
        });

        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter' || this.value === '') {
                filterStores();
            }
        });
    });
    </script>

    <div class="uk-position-fixed uk-position-bottom-right uk-padding">
    <a href="#" uk-totop uk-scroll></a>
    </div>

</div>

    <?php if (isset($itemDetails['page_ad_sidebar']) && $itemDetails['page_ad_sidebar'] == 1): ?>
<?php if(!empty($sidebarAd)): ?>
    <div class="uk-width-1-1 uk-width-1-4@m uk-text-center">
    <?php require './sections/views/sidebar-ad.view.php'; ?>
    </div>
<?php endif; ?>
<?php endif; ?>


</div>
</div>