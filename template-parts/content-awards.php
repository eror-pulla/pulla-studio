
<section class="awards">
    <div class="wraper-awards">
        <div class="inside-awards">
            <div class="split-lines">
                <h2 class="title" data-scroll>AwaRds</h2>
            </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('awards')): ?>
                        <?php while (have_rows('awards')): the_row(); 
                            $image = get_sub_field('image');
                            $name = get_sub_field('name');
                            $times_won = get_sub_field('times_won');
                        ?>
                            <div class="swiper-slide" data-scroll>
                                <div class="inside-slide" >
                                    <div class="img-wrap-company">
                                        <?php if ($image): ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="" data-scroll>
                                        <?php else: ?>
                                            <p>No image available</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-wrap-award">
                                        <p class="name" data-scroll><?php echo esc_html($name); ?></p>
                                        <p class="number" data-scroll>/<?php echo esc_html($times_won); ?>/</p>
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

