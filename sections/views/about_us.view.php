<!-- Section: About Us (70/30) -->
<div class="uk-section uk-section-muted about-us-section">
    <div class="uk-container">
        <div class="uk-grid-large uk-flex-middle" uk-grid>
            <!-- Graphics First on Mobile -->
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

            <!-- Content Second on Mobile, First on Desktop -->
            <div class="uk-width-2-3@m uk-flex-first@m">
                <h2 class="uk-text-bold uk-text-primary"><?php echo echoOutput($section_about_us['section_title']); ?></h2>
                <div id="about-content-wrapper" class="uk-text-lead uk-text-secondary">
                    <div id="about-content" class="about-content">
                        <?php echo parseCustomTags($section_about_us['section_description']); ?>
                    </div>
                    <button id="about-view-more" class="uk-button uk-button-text uk-margin-small-top uk-hidden" style="color: var(--uk-primary-color); text-transform: none; font-weight: bold;">View more</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 640px) {
            .about-content.truncated {
                display: -webkit-box;
                -webkit-line-clamp: 5;
                -webkit-box-orient: vertical;  
                overflow: hidden;
                text-overflow: ellipsis;
            }
            #about-view-more.uk-hidden {
                display: none !important;
            }
            #about-view-more {
                display: inline-block !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var content = document.getElementById('about-content');
            var btn = document.getElementById('about-view-more');
            
            if (window.innerWidth <= 640) {
                // Check if content is actually longer than 5 lines
                // We apply the class first to check height
                content.classList.add('truncated');
                
                // If the scrollHeight is greater than clientHeight, it means it's truncated
                if (content.scrollHeight > content.clientHeight) {
                    btn.classList.remove('uk-hidden');
                } else {
                    content.classList.remove('truncated');
                }

                btn.addEventListener('click', function() {
                    if (content.classList.contains('truncated')) {
                        content.classList.remove('truncated');
                        btn.innerText = 'View less';
                    } else {
                        content.classList.add('truncated');
                        btn.innerText = 'View more';
                    }
                });
            }
        });
    </script>
</div>
