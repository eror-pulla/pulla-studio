
<div class="wrap-values-stats">
    <section class="values">
        <div class="wraper-values">
            <div class="split-lines">
                <h1 class="text-principles" data-scroll>Our pRinciplEs</h1>
            </div>
            <div class="split-lines">
                <h1 class="text-values" data-scroll>and valuEs</h1>
            </div>
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
                                $img_alt = get_sub_field('img_alt'); 
    
                                
                                $additional_attrs = ($counter == 5) ? 'data-scroll-speed="-1"' : '';
    
                                $sections[] = '<div class="section-' . $counter . '" data-section-id="' . $counter . '" data-scroll ' . $additional_attrs . '>
                                        <img src="' . esc_url($img) . '" alt="' . esc_attr($img_alt) . '">
                                    <div class="wrap-text-value">
                                        <p class="val" data-scroll>/ ' . esc_html($name) . ' /</p>
                                        <p class="text" data-scroll>' . esc_html($text) . '</p>
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
                            echo '<div class="wrap-brick" data-scroll>';
                            echo $sections[$i];
                            echo '</div>';
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
    <section class="stats">
        <div class="wraper-stats">
            <div class="inside-stats">
                <div class="wraper-inside-text">
                    <h5 data-scroll><?php echo $title ?></h5>
                    <div class="texts">
                        <p class="left-right" data-scroll><?php echo $text_left ?></p>
                        <p class="left-right" data-scroll><?php echo $text_right ?></p>
                    </div>
                </div>
                <div class="img-wrap-comp">
                <div class="wrap-brick" data-scroll>
                    <div class="brick-img" data-scroll data-scroll-speed="-2">
                        <img src="<?php echo $img ?>" alt=""></div>
                        <div class="curtain"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>