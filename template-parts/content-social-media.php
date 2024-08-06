<!-- <section class="social-media">
    <div class="wraper-social">
        <div class="inside-social">
            <h1>SOcial mEdia</h1>
            <div class="socials">
                <ul>
                    <div class="socials-wraper">
                        <p class="nr">00-1</p>
                        <p class="name">Instagram</p>
                        <div class="go-to">
                            <a href="">
                                <p>Go to instagram</p>
                                <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="socials-wraper">
                        <p class="nr">00-2</p>
                        <p class="name">Linkedin</p>
                        <div class="go-to">
                            <a href="">
                                <p>Go to Linkedin</p>
                                <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="socials-wraper">
                        <p class="nr">00-3</p>
                        <p class="name">Facebook</p>
                        <div class="go-to">
                            <a href="">
                                <p>Go to Facebook</p>
                                <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="socials-wraper">
                        <p class="nr">00-4</p>
                        <p class="name">Behance</p>
                        <div class="go-to">
                            <a href="">
                                <p>Go to Behance</p>
                                <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="socials-wraper">
                        <p class="nr">00-5</p>
                        <p class="name">Vimeo</p>
                        <div class="go-to">
                            <a href="">
                                <p>Go to Vimeo</p>
                                <img src="<?php echo get_template_directory_uri() . '/imgs/Arrow.png'; ?>" alt="">
                            </a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</section> -->

<section class="social-media">
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
                                    <a href="<?php echo esc_url($url); ?>">
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