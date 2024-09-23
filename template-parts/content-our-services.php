<?php if (have_rows('our_services')) : ?>
    <section class="services" >
        <div class="wraper-services">
            <div class="inside-services">
                <div class="headline">
                    <div class="split-lines">
                        <h1 data-scroll>We Offer Design</h1>
                    </div>
                    <div class="split-lines">
                        <h1 class="indent" data-scroll>Services</h1>
                    </div>
                </div>
                <div class="services-products">
                    <div class="products-inside">
                        <?php while (have_rows('our_services')) : the_row(); ?>
                            <?php if (have_rows('services_repeater')) : ?>
                                <?php while (have_rows('services_repeater')) : the_row(); ?>
                                    <p data-scroll>/ Our Services /</p>
                                    <div class="wrap-products" data-scroll>
                                        <div class="name">
                                            <div class="split-lines">
                                                <h3 data-scroll><?php the_sub_field('service_name'); ?></h3>
                                            </div>
                                        </div>
                                        <div class="categories">
                                            <div class="button-wraper">
                                                <?php if (have_rows('service_categories')) : ?>
                                                    <?php while (have_rows('service_categories')) : the_row(); ?>
                                                        <button class="button" data-scroll><span data-scroll><?php the_sub_field('cats'); ?></span></button>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="text-wraper">
                                                <p data-scroll><?php the_sub_field('service_text'); ?></p>
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
