
<section class="awards">
    <div class="wraper-awards">
        <div class="inside-awards">
            <h2 class="title">AwaRds</h2>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('awards')): ?>
                        <?php while (have_rows('awards')): the_row(); 
                            $image = get_sub_field('image');
                            $name = get_sub_field('name');
                            $times_won = get_sub_field('times_won');
                        ?>
                            <div class="swiper-slide">
                                <div class="inside-slide">
                                    <div class="img-wrap">
                                        <?php if ($image): ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="">
                                        <?php else: ?>
                                            <p>No image available</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-wrap">
                                        <p class="name"><?php echo esc_html($name); ?></p>
                                        <p class="number">/<?php echo esc_html($times_won); ?>/</p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No awards found</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

