<?php if (have_rows('our_services')) : ?>
    <section class="services">
        <div class="wraper-services">
            <div class="inside-services">
                <div class="headline">
                    <h1>We Offer Design</h1>
                    <h1 class="indent">Services</h1>
                </div>
                <div class="services-products">
                    <div class="products-inside">
                        <?php while (have_rows('our_services')) : the_row(); ?>
                            <?php if (have_rows('services_repeater')) : ?>
                                <?php while (have_rows('services_repeater')) : the_row(); ?>
                                    <p>/ Our Services /</p>
                                    <div class="wrap-products">
                                        <div class="name">
                                            <h3><?php the_sub_field('service_name'); ?></h3>
                                        </div>
                                        <div class="categories">
                                            <div class="button-wraper">
                                                <?php if (have_rows('service_categories')) : ?>
                                                    <?php while (have_rows('service_categories')) : the_row(); ?>
                                                        <button class="button"><?php the_sub_field('cats'); ?></button>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="text-wraper">
                                                <p><?php the_sub_field('service_text'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
