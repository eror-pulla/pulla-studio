<section class="social-media" data-scroll-section>
    <div class="wraper-social">
        <div class="inside-social">
            <h1>Social Media</h1>
            <div class="socials">
                <ul>
                    <?php if (have_rows('social_media', 'option')): ?>
                        <?php while (have_rows('social_media', 'option')): the_row(); ?>
                            <?php 
                            $name = get_sub_field('name');
                            $url = get_sub_field('url');
                            ?>
                            <div class="socials-wraper">
                                <p class="nr"><?php echo sprintf('00-%d', get_row_index()); ?></p>
                                <p class="name"><?php echo esc_html($name); ?></p>
                                <div class="go-to">
                                    <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                        <p>Go to <?php echo esc_html($name); ?></p>
                                        <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
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
