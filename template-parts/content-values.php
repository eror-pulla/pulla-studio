<!-- <section class="values">
    <div class="wraper-values">
        <h1 class="text-principles">Our pRinciplEs</h1>
        <h1 class="text-values">and valuEs</h1>
        <div class="inside-values">
            <div class="section-1">
                <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-1.png'; ?>" alt="">
                <div class="wrap-text-value">
                    <p class="val">/ values /</p>
                    <p class="text">“At, we're on a mission to transform the digital landscape. We're a dynamic team of experts driven”.</p>
                </div>
            </div>
            <div class="section-2">
                <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-2.png'; ?>" alt="">
                <div class="wrap-text-value">
                    <p class="val">/ values /</p>
                    <p class="text">“At, we're on a mission to transform the digital landscape. We're a dynamic team of experts driven”.</p>
                </div>
            </div>
             <div class="section-3">
                <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-2.png'; ?>" alt="">
                <div class="wrap-text-value">
                    <p class="val">/ values /</p>
                    <p class="text">“At, we're on a mission to transform the digital landscape. We're a dynamic team of experts driven”.</p>
                </div>
            </div>
             <div class="section-4">
                <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-1.png'; ?>" alt="">
                <div class="wrap-text-value">
                    <p class="val">/ values /</p>
                    <p class="text">“At, we're on a mission to transform the digital landscape. We're a dynamic team of experts driven”.</p>
                </div>
            </div>
             <div class="section-5">
                <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-1.png'; ?>" alt="">
                <div class="wrap-text-value">
                    <p class="val">/ values /</p>
                    <p class="text">“At, we're on a mission to transform the digital landscape. We're a dynamic team of experts driven”.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<section class="values">
    <div class="wraper-values">
        <h1 class="text-principles">Our pRinciplEs</h1>
        <h1 class="text-values">and valuEs</h1>
        <div class="inside-values">
            <?php 
            if( have_rows('values') ): // Check if the 'values' group exists
                while( have_rows('values') ): the_row(); 
                    if( have_rows('values_repeater') ): // Check if 'values_repeater' rows exist within 'values'
                        $counter = 1; // To handle the section classes dynamically
                        while( have_rows('values_repeater') ): the_row(); 
                            $img = get_sub_field('img'); // Get the image field
                            $name = get_sub_field('name'); // Get the name field
                            $text = get_sub_field('text'); // Get the text field
                            ?>
                            <div class="section-<?php echo $counter; ?>">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                                <div class="wrap-text-value">
                                    <p class="val">/ <?php echo esc_html($name); ?> /</p>
                                    <p class="text"><?php echo esc_html($text); ?></p>
                                </div>
                            </div>
                            <?php $counter++; // Increment the counter ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>




<?php 
$under_values_section = get_field('under_values_section');
$img= $under_values_section['image'];
$title= $under_values_section['title'];
$text_right= $under_values_section['text_right'];
$text_left= $under_values_section['text_left'];


?>
<section class="stats">
    <div class="wraper-stats">
        <div class="inside-stats">
            <div class="wraper-inside-text">
                <h5><?php echo $title ?></h5>
                <div class="texts">
                    <p class="left-right"><?php echo $text_left ?></p>
                    <p class="left-right"><?php echo $text_right ?></p>
                </div>
            </div>
            <div class="img-wrap">
                <img src="<?php echo $img ?>" alt=""></div>
        </div>
    </div>
</section>