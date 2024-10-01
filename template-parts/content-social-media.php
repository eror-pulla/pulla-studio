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
                <ul class="artists">
                    <?php if (have_rows('social_media', 'option')): ?>
                        <?php while (have_rows('social_media', 'option')): the_row(); ?>
                            <?php 
                            $name = get_sub_field('name');
                            $url = get_sub_field('url');
                            $img = get_sub_field('image');
                            $video_id = get_sub_field('video_id');
                            ?>
                            <div class="socials-wraper" data-scroll>
                            <div class="imgs-wrap-social">
                                <iframe class="hover-iframe"
                                src="https://player.vimeo.com/video/<?php echo esc_attr($video_id); ?>?autoplay=0&amp;loop=1&amp;muted=1&amp;byline=0&amp;portrait=0&amp;title=0&amp;speed=0&amp;transparent=0&amp;controls=0"
                                allow="autoplay; fullscreen; picture-in-picture"
                                allowfullscreen></iframe>
                            </div>
                            <a class="show-img" href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener noreferrer">
                                <p class="nr" data-scroll><?php echo sprintf('00-%d', get_row_index()); ?></p>
                                <div class="split-lines">
                                    <p class="name" data-scroll><?php echo esc_html($name); ?></p>
                                </div>
                                <div class="go-to">
                                    <div class="link-in-link">
                                        <p data-scroll>Go to <?php echo esc_html($name); ?></p>
                                        <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="" data-scroll>
                                    </div>
                                </div>
                            </a>
                            </div>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
