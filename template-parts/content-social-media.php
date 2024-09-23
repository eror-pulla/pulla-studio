<section class="social-media">
    <div class="wraper-social">
        <div class="inside-social">
            <div class="wraper-lines">
                <div class="split-lines">
                    <h1 data-scroll class="word-1">Social</h1>
                </div>
                <div class="split-lines">
                    <h1 data-scroll class="word-2">Media</h1>
                </div>
            </div>
            <div class="socials" data-scroll>
                <ul>
                    <?php if (have_rows('social_media', 'option')): ?>
                        <?php while (have_rows('social_media', 'option')): the_row(); ?>
                            <?php 
                            $name = get_sub_field('name');
                            $url = get_sub_field('url');
                            ?>
                            <div class="socials-wraper" data-scroll>
                                <p class="nr" data-scroll><?php echo sprintf('00-%d', get_row_index()); ?></p>
                                <div class="split-lines">
                                    <p class="name" data-scroll><?php echo esc_html($name); ?></p>
                                </div>
                                <div class="go-to">
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                        <p data-scroll>Go to <?php echo esc_html($name); ?></p>
                                        <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="" data-scroll>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
