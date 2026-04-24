<!-- SIDEMENU -->

<div class="tas-sidemenu" id="sidemenu" uk-offcanvas="overlay: true;">

    <div class="uk-offcanvas-bar uk-flex uk-flex-column">

            <div class="uk-width-1-1 uk-flex uk-flex-middle uk-flex-center">
                <a href="<?php echo $urlPath->home(); ?>">
                <img class="uk-logo" src="<?php echo $urlPath->image($theme['th_logo']); ?>" alt="<?php echo $translation['tr_1']; ?>">
                </a>
            </div>
<!--
<hr>

        <?php if (!isLogged()): ?>
        <a href="<?php echo $urlPath->signin(); ?>" class="tas-signin uk-button uk-button-primary uk-border-rounded">
        <?php echo $translation['tr_48']; ?>
        </a>
        <?php endif; ?>


        <?php if (isLogged()): ?>

            <div class="uk-flex uk-flex-center">
                <article class="uk-comment tas-profile-header">
                <header class="uk-comment-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">

                        <div class="uk-cover-container uk-border-circle">
                            <img src="<?php echo $urlPath->image($userInfo['user_avatar']); ?>" alt="<?php echo echoOutput($userInfo['user_name']); ?>" class="uk-comment-avatar" uk-cover>
                            <canvas width="50" height="50"></canvas>
                        </div>

                        </div>
                        <a class="uk-link-reset" href="<?php echo $urlPath->profile(); ?>">
                            <div class="uk-width-expand">
                            <h5 class="uk-comment-title uk-margin-remove uk-text-truncate"><?php echo echoOutput(textTruncate($userInfo['user_name'], 10)); ?></h5>
                            <p class="sub-text uk-text-truncate"><?php echo $translation['tr_10']; ?></p>
                        </div>
                    </a>
                    </div>
                </header>
            </article>
        </div>
        <?php endif; ?>

        -->
<hr>

        <ul class="tas-main-menu uk-nav-default uk-margin-small-bottom" uk-nav style="font-weight: 400 !important;">
        <?php 
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
            <li class="<?php echo $isActive ? 'uk-active' : ''; ?> <?php echo $hasChildren ? 'uk-parent' : ''; ?>">
                <a href="<?php echo $navUrl; ?>" target="<?php echo $item['navigation_target']; ?>" style="font-weight: 400;">
                    <?php if (!empty($item['navigation_icon'])): ?>
                        <?php if (strpos($item['navigation_icon'], '.') !== false): ?>
                            <img src="<?php echo $urlPath->image($item['navigation_icon']); ?>" style="width: 18px; height: 18px; margin-right: 10px; flex-shrink: 0;">
                        <?php else: ?>
                            <i class="<?php echo $item['navigation_icon']; ?>" style="margin-right: 10px; flex-shrink: 0;"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                    <span><?php echo echoOutput($item['navigation_label']); ?></span>
                </a>

                <?php if ($hasChildren): ?>
                    <ul class="uk-nav-sub">
                        <?php foreach($item['children'] as $child): ?>
                            <?php $childUrl = ($child['navigation_type'] == 'custom') ? $child['navigation_url'] : $urlPath->page($child['navigation_url']); ?>
                            <li>
                                <a href="<?php echo $childUrl; ?>" target="<?php echo $child['navigation_target']; ?>" style="font-weight: 400;">
                                    <?php if (!empty($child['navigation_icon'])): ?>
                                        <?php if (strpos($child['navigation_icon'], '.') !== false): ?>
                                            <img src="<?php echo $urlPath->image($child['navigation_icon']); ?>" style="width: 16px; height: 16px; margin-right: 10px; flex-shrink: 0;">
                                        <?php else: ?>
                                            <i class="<?php echo $child['navigation_icon']; ?>" style="margin-right: 10px; flex-shrink: 0;"></i>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php echo echoOutput($child['navigation_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>

        <div class="uk-width-1-1 uk-flex uk-flex-center">
        <ul class="tas-followus uk-iconnav uk-margin-small-top uk-margin-small-bottom">
        <?php foreach($socialMedia as $item): ?>
        <?php if (!empty($item['st_facebook'])): ?>
        <li><a href="<?php echo $item['st_facebook'] ?>" uk-icon="icon: facebook" style="color: #3b5998"></a></li>
        <?php endif;?>
        <?php if (!empty($item['st_twitter'])): ?>
        <li><a href="<?php echo $item['st_twitter'] ?>" uk-icon="icon: twitter" style="color: #1da1f2"></a></li>
        <?php endif;?>
        <?php if (!empty($item['st_youtube'])): ?>
        <li><a href="<?php echo $item['st_youtube'] ?>" uk-icon="icon: youtube" style="color: #ff0000"></a></li>
        <?php endif;?>
        <?php if (!empty($item['st_linkedin'])): ?>
        <li><a href="<?php echo $item['st_linkedin'] ?>" uk-icon="icon: linkedin" style="color: #0077b5"></a></li>
        <?php endif;?>
        <?php if (!empty($item['st_instagram'])): ?>
        <li><a href="<?php echo $item['st_instagram'] ?>" uk-icon="icon: instagram" style="color: #c13584"></a></li>
        <?php endif;?>
        <?php if (!empty($item['st_whatsapp'])): ?>
        <li><a href="<?php echo $item['st_whatsapp'] ?>" uk-icon="icon: whatsapp" style="color: #25d366"></a></li>
        <?php endif;?>
        <?php endforeach; ?>
        </ul>
        </div>

    </div>

</div>

<!-- END SIDEMENU -->