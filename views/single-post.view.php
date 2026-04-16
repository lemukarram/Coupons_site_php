<section class="uk-section uk-section-default">
    <div class="uk-container uk-container-small">
        <article class="uk-article">
            <h1 class="uk-article-title"><?php echo $post['post_title']; ?></h1>
            <p class="uk-article-meta"><?php echo formatDate($post['post_created']); ?></p>

            <?php if($post['post_image']): ?>
            <div class="uk-margin-medium-bottom">
                <img src="<?php echo $urlPath->image($post['post_image']); ?>" alt="<?php echo $post['post_title']; ?>" class="uk-border-rounded">
            </div>
            <?php endif; ?>

            <div class="uk-text-lead uk-margin-medium-bottom">
                <?php echo nl2br($post['post_content']); ?>
            </div>

            <hr class="uk-divider-icon">

            <!-- Comments Section -->
            <div id="comments" class="uk-margin-large-top">
                <h3>Comments (<?php echo count($comments); ?>)</h3>
                
                <?php foreach($comments as $comment): ?>
                <div class="uk-comment uk-comment-primary uk-margin-medium-bottom uk-border-rounded">
                    <header class="uk-comment-header">
                        <div class="uk-grid-medium uk-flex-middle" uk-grid>
                            <div class="uk-width-auto">
                                <img class="uk-comment-avatar uk-border-circle" src="<?php echo getGravatar($comment['comment_email'], 50); ?>" width="50" height="50" alt="">
                            </div>
                            <div class="uk-width-expand">
                                <h4 class="uk-comment-title uk-margin-remove"><?php echo echoOutput($comment['comment_name']); ?></h4>
                                <p class="uk-comment-meta uk-margin-remove-top"><?php echo formatDate($comment['comment_date']); ?></p>
                            </div>
                        </div>
                    </header>
                    <div class="uk-comment-body">
                        <p><?php echo nl2br(echoOutput($comment['comment_content'])); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Comment Form -->
                <div class="uk-card uk-card-default uk-card-body uk-margin-large-top uk-border-rounded">
                    <h4>Leave a Comment</h4>
                    <form action="<?php echo SITE_URL; ?>/controllers/add-comment.php" method="POST" class="uk-form-stacked">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <input type="hidden" name="post_slug" value="<?php echo $post['post_slug']; ?>">
                        
                        <div class="uk-margin">
                            <label class="uk-form-label">Name</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-border-rounded" type="text" name="name" required>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Email</label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-border-rounded" type="email" name="email" required>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label">Comment</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea uk-border-rounded" name="content" rows="5" required></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="uk-button uk-button-primary uk-border-rounded">Submit Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </div>
</section>
