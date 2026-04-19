<div class="uk-section-primary uk-visible@m">
<div class="uk-container">

    <nav class="tas_top_nav uk-padding-small uk-flex uk-flex-center uk-flex-middle" uk-navbar>

        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="<?php echo $urlPath->home(); ?>">
                <img src="<?php echo $urlPath->image($theme['th_whitelogo']); ?>" alt="<?php echo $translation['tr_1']; ?>">
            </a>
        </div>

        <div class="uk-navbar-center">
        <ul class="uk-navbar-nav">
        <?php 
            // Organize navigation into a tree
            $navTree = [];
            foreach($navigationHeader as $nav) {
                if (empty($nav['navigation_parent'])) {
                    $nav['children'] = [];
                    $navTree[$nav['navigation_id']] = $nav;
                }
            }
            foreach($navigationHeader as $nav) {
                if (!empty($nav['navigation_parent']) && isset($navTree[$nav['navigation_parent']])) {
                    $navTree[$nav['navigation_parent']]['children'][] = $nav;
                }
            }
        ?>
        <?php foreach($navTree as $item): ?>
            <?php 
                $hasChildren = !empty($item['children']);
                $navUrl = ($item['navigation_type'] == 'custom') ? ($item['navigation_url'] == '/' ? $urlPath->home() : $item['navigation_url']) : $urlPath->page($item['navigation_url']);
                $isActive = ($item['navigation_url'] == '/' && $index_url == "index.php") || ($current_url == $item['navigation_url']);
            ?>
            <li class="<?php echo $isActive ? 'uk-active' : ''; ?> <?php echo $hasChildren ? 'has-submenu' : ''; ?>">
                <a href="<?php echo $navUrl; ?>" target="<?php echo $item['navigation_target']; ?>" class="uk-flex uk-flex-middle">
                    <?php if (!empty($item['navigation_icon'])): ?>
                        <?php if (strpos($item['navigation_icon'], '.') !== false): ?>
                            <img src="<?php echo $urlPath->image($item['navigation_icon']); ?>" style="width: 18px; height: 18px; margin-right: 3px; flex-shrink: 0;">
                        <?php else: ?>
                            <i class="<?php echo $item['navigation_icon']; ?>" style="margin-right: 3px; flex-shrink: 0;"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                    <span><?php echo echoOutput($item['navigation_label']); ?></span>
                </a>

                <?php if ($hasChildren): ?>
                    <div class="vch-submenu">
                        <div class="vch-submenu-grid">
                            <?php foreach($item['children'] as $child): ?>
                                <?php $childUrl = ($child['navigation_type'] == 'custom') ? $child['navigation_url'] : $urlPath->page($child['navigation_url']); ?>
                                <a href="<?php echo $childUrl; ?>" class="vch-submenu-item" target="<?php echo $child['navigation_target']; ?>">
                                    <?php if (!empty($child['navigation_icon'])): ?>
                                        <?php if (strpos($child['navigation_icon'], '.') !== false): ?>
                                            <img src="<?php echo $urlPath->image($child['navigation_icon']); ?>">
                                        <?php else: ?>
                                            <i class="<?php echo $child['navigation_icon']; ?>"></i>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php echo echoOutput($child['navigation_label']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>

     <div class="uk-navbar-right">

<?php if (isLogged()): ?>

    <div class="uk-grid-small uk-flex-middle" uk-grid>
        <div class="uk-width-auto">
        <div class="uk-cover-container uk-border-circle">
            <img src="<?php echo $urlPath->image($userInfo['user_avatar']); ?>" alt="<?php echo echoOutput($userInfo['user_name']); ?>" uk-cover>
            <canvas width="50" height="50"></canvas>
        </div>
        </div>
        <div class="uk-width-expand">
            <h5 class="uk-margin-remove-bottom uk-text-bold uk-light"><?php echo echoOutput(textTruncate($userInfo['user_name'], 10)); ?></h5>
            <p class="uk-comment-meta uk-margin-remove-top"><a href="<?php echo $urlPath->profile(); ?>" class="uk-link-muted"><?php echo $translation['tr_10']; ?></a></p>
        </div>
    </div>

<?php endif; ?>

<?php if (!isLogged()): ?>

    <a href="<?php echo $urlPath->signin(); ?>" class="uk-button uk-button-large uk-text-bold uk-border-pill button-header">
        <i class="ti ti-lock"></i> <?php echo $translation['tr_5']; ?>
    </a>

<?php endif; ?>

</div>

</nav>
</div>

</div>

<?php require './sections/mobile-header.php'; ?>