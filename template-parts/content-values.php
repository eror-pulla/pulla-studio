<!-- 
 <section class="values" data-scroll-section>
    <div class="wraper-values">
        <h1 class="text-principles">Our pRinciplEs</h1>
        <h1 class="text-values">and valuEs</h1>
        <div class="inside-values">
            <?php 
            if( have_rows('values') ): 
                while( have_rows('values') ): the_row(); 
                    if( have_rows('values_repeater') ): 
                        $counter = 1; 
                        while( have_rows('values_repeater') ): the_row(); 
                            $img = get_sub_field('img'); 
                            $name = get_sub_field('name'); 
                            $text = get_sub_field('text');
                            ?>
                            <div class="section-<?php echo $counter; ?>" data-scroll data-scroll-repeat="true" data-section-id="<?php echo $counter; ?>">
                                <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                                <div class="wrap-text-value">
                                    <p class="val">/ <?php echo esc_html($name); ?> /</p>
                                    <p class="text"><?php echo esc_html($text); ?></p>
                                </div>
                            </div>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section> -->

<section class="values">
    <div class="wraper-values">
        <h1 class="text-principles">Our pRinciplEs</h1>
        <h1 class="text-values">and valuEs</h1>
        <div class="inside-values">
            <?php 
            if( have_rows('values') ): 
                $sections = []; 
                while( have_rows('values') ): the_row(); 
                    if( have_rows('values_repeater') ): 
                        $counter = 1; 
                        while( have_rows('values_repeater') ): the_row(); 
                            $img = get_sub_field('img'); 
                            $name = get_sub_field('name'); 
                            $text = get_sub_field('text');
                            $sections[] = '<div class="section-' . $counter . '" data-section-id="' . $counter . '">
                                <img src="' . $img . '" alt="' . $img_alt . '">
                                <div class="wrap-text-value">
                                    <p class="val">/ ' . esc_html($name) . ' /</p>
                                    <p class="text">' . esc_html($text) . '</p>
                                </div>
                            </div>';
                            $counter++; 
                        endwhile; 
                    endif; 
                endwhile;
                $current_wrapper = '';
                $section_count = count($sections);
                for ($i = 0; $i < $section_count; $i++) {
                    if ( $i == 4) {
                        if ($current_wrapper != 'vertical-scroll') {
                            if ($current_wrapper != '') {
                                echo '</div>'; 
                            }
                            echo '<div class="vertical-scroll">';
                            $current_wrapper = 'vertical-scroll';
                        }
                        echo $sections[$i];
                    } elseif ($i == 0 || $i == 1 || $i == 2 || $i == 3) {
                        if ($current_wrapper != 'horizontal-scroll') {
                            if ($current_wrapper != '') {
                                echo '</div>'; 
                            }
                            echo '<div class="horizontal-scroll"> <div class="pin-wrap"> <div class="animation-wrap to-right">';
                            $current_wrapper = 'horizontal-scroll';
                        }
                        echo $sections[$i];

                        if($i == 3){
                            echo '</div></div>';
                        }
                    }
                }
                if ($current_wrapper != '') {
                    echo '</div>';
                }
            endif;
            ?>
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
<section class="stats" data-scroll-section>
    <div class="wraper-stats">
        <div class="inside-stats">
            <div class="wraper-inside-text">
                <h5><?php echo $title ?></h5>
                <div class="texts">
                    <p class="left-right"><?php echo $text_left ?></p>
                    <p class="left-right"><?php echo $text_right ?></p>
                </div>
            </div>
            <div class="img-wrap-comp">
                <img src="<?php echo $img ?>" alt=""></div>
        </div>
    </div>
</section>