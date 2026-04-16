<section class="uk-section uk-section-muted">
    <div class="uk-container">
        <h1 class="uk-heading-line uk-text-center"><span><?php echo _POSTS; ?></span></h1>
        
        <div class="uk-grid-medium uk-child-width-1-2@m uk-grid-match" uk-grid>
            <?php foreach($posts as $post): ?>
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-border-rounded">
                    <?php if($post['post_image']): ?>
                    <div class="uk-card-media-top">
                        <img src="<?php echo $urlPath->image($post['post_image']); ?>" alt="<?php echo $post['post_title']; ?>" class="uk-border-rounded">
                    </div>
                    <?php endif; ?>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title"><a class="uk-link-reset" href="<?php echo $urlPath->post($post['post_slug']); ?>"><?php echo $post['post_title']; ?></a></h3>
                        <p class="uk-text-meta"><?php echo formatDate($post['post_created']); ?></p>
                        <p><?php echo textTruncate(strip_tags($post['post_content']), 150); ?></p>
                    </div>
                    <div class="uk-card-footer">
                        <a href="<?php echo $urlPath->post($post['post_slug']); ?>" class="uk-button uk-button-text">Read more</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
