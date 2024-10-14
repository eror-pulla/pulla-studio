


<section class="single-grid">
    <div class="wraper-single-grid">
        <div class="inside-single-wrap">
            <?php 
            if( have_rows('grid') ): 
                while( have_rows('grid') ): the_row();
                    if( have_rows('section') ): 
                        while( have_rows('section') ): the_row();

                            $select_grid = get_sub_field('select_grid');
                            if( $select_grid == '2 img or video and text' || $select_grid == 'one' ):
                                if( have_rows('imgs_and_text_2') ):
                                    $wraper_class = 'wraper-2-text';
                                    ?>
                                    <div class="<?php echo esc_attr($wraper_class); ?>" data-scroll-section>
                                        <?php 
                                        while( have_rows('imgs_and_text_2') ): the_row();
                                            $text = get_sub_field('text'); 
                                            if( have_rows('repeater') ):
                                                $counter = 0; 
                                                while( have_rows('repeater') ): the_row(); 
                                                    $choose = get_sub_field('choose');
                                                    $image = get_sub_field('image');
                                                    $video = get_sub_field('video');

                                                    if (is_array($image)) {
                                                        $image_url = esc_url($image['url']);
                                                        $image_alt = esc_attr($image['alt']);
                                                    } else {
                                                        $image_url = esc_url($image);
                                                        $image_alt = ''; 
                                                    }

                                                    if( $choose == 'one' && $image_url ):
                                                        $counter++;
                                                        $img_class = 'img-wrap-' . $counter;
                                                        ?>
                                                        <div class="<?php echo esc_attr($img_class); ?>" data-scroll>
                                                            
                                                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                                                                <div class="curtain"></div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    elseif( $choose == 'two' && $video ):
                                                        $counter++;
                                                        $video_class = 'img-wrap-' . $counter;
                                                        ?>
                                                        <div class="<?php echo esc_attr($video_class); ?>" data-scroll>
                                                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                            <div class="plyr__video-embed">
                                                                <iframe
                                                                    src="https://player.vimeo.com/video/<?php echo esc_attr($video); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                                                    allow="autoplay; fullscreen; picture-in-picture"
                                                                    allowfullscreen
                                                                ></iframe>
                                                            </div>
                                                            <div class="curtain"></div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    endif;
                                                endwhile;
                                            endif;
                                        endwhile;
                                        ?>
                                        <p data-scroll><?php echo esc_html($text); ?></p>
                                    </div>
                                    <?php 
                                endif;
                            endif;

                            if( $select_grid == 'full width img' || $select_grid == 'two' ):
                                if( have_rows('full_width') ):
                                    ?>
                                    <div class="full-section" data-scroll-section>
                                        <?php 
                                        while( have_rows('full_width') ): the_row();
                                            $choose_img_or_video = get_sub_field('choose_img_or_video'); 
                                            $image = get_sub_field('img');
                                            $video = get_sub_field('video');
                            
                                            if (strtolower($choose_img_or_video) == 'img' && !empty($image)):
                                                if (is_array($image)) {
                                                    $image_url = esc_url($image['url']);
                                                    $image_alt = esc_attr($image['alt']);
                                                } else {
                                                    $image_url = esc_url($image);
                                                    $image_alt = ''; 
                                                }
                                                ?>
                                                <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" data-scroll>
                                                    <div class="curtain"></div>
                                                </div>
                                                <!-- <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" data-scroll> -->
                                                <?php
                                            elseif (strtolower($choose_img_or_video) == 'video' && !empty($video)):
                                                ?>
                                                <div class="video-wrap">
                                                <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                    <div class="plyr__video-embed">
                                                        <iframe
                                                            src="https://player.vimeo.com/video/<?php echo esc_attr($video); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                                            allow="autoplay; fullscreen; picture-in-picture"
                                                            allowfullscreen
                                                        ></iframe>
                                                    </div>
                                                    <div class="curtain"></div>
                                                    </div>
                                                </div>
                                                <?php
                                            endif;
                                        endwhile;
                                        ?>
                                    </div>
                                    <?php 
                                endif;
                            endif;

                            if( $select_grid == 'text' || $select_grid == 'three' ):
                                if (have_rows('paragraphs')):
                                    $text_blocks = [];
                                    $alignment = '';
                                    while(have_rows('paragraphs')): the_row();
                                        $alignment = get_sub_field('paragraph_align'); 
                                        $text_1 = get_sub_field('text_1', false, false);
                                        $text_2 = get_sub_field('text_2', false, false);
                                        $text_3 = get_sub_field('text_3', false, false);
                                        if ($text_1) $text_blocks[] = $text_1;
                                        if ($text_2) $text_blocks[] = $text_2;
                                        if ($text_3) $text_blocks[] = $text_3;
                                    endwhile;
                                    $text_count = count($text_blocks);
                                    $additional_class = '';
                                    if ($text_count == 1) {
                                        if ($alignment == 'center') {
                                            $additional_class = 'justify-center';
                                        } elseif ($alignment == 'right') {
                                            $additional_class = 'justify-end';
                                        }
                                    } elseif ($text_count == 2) {
                                        if ($alignment == 'right') {
                                            $additional_class = 'justify-end';
                                        }
                                    }
                                    ?>
                                    <div class="text-section <?php echo esc_attr($additional_class); ?>" data-scroll-section>
                                        <?php foreach ($text_blocks as $text): ?>
                                            <p data-scroll><?php echo esc_html($text); ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php
                                endif;
                            endif;

                            if( $select_grid == 'four' || $select_grid == '3 img or video' ):
                                if( have_rows('3_grid') ):
                                    while( have_rows('3_grid') ): the_row();
                                        if( have_rows('repeater') ):
                                            $class_names = ['img-M right-3', 'img-S left', 'img-L middle-3'];
                                            ?>
                                            <div class="wraper-grid-3" data-scroll-section>
                                                <?php 
                                                $counter = 0;
                                                while( have_rows('repeater') ): the_row();
                                                    $choose_img_or_video = get_sub_field('choose_img_or_video');
                                                    $image = get_sub_field('img');
                                                    $video = get_sub_field('video');
                                                    
                                                    $current_class = isset($class_names[$counter]) ? $class_names[$counter] : '';
                            
                                                    ?>
                                                    <div class="<?php echo esc_attr($current_class); ?>" data-scroll>
                                                        <?php if (strtolower($choose_img_or_video) == 'img' && !empty($image)): ?>
                                                            <?php 
                                                            if (is_array($image)) {
                                                                $image_url = esc_url($image['url']);
                                                                $image_alt = esc_attr($image['alt']);
                                                            } else {
                                                                $image_url = esc_url($image);  
                                                                $image_alt = ''; 
                                                            }
                                                            ?>
                                                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                                                                <div class="curtain"></div>
                                                            </div>
                                                            <!-- <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"> -->
                                                        <?php elseif (strtolower($choose_img_or_video) == 'video' && !empty($video)): ?>
                                                            <div class="video-wrap">
                                                                <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                                <div class="plyr__video-embed">
                                                                    <iframe
                                                                        src="https://player.vimeo.com/video/<?php echo esc_attr($video); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                                                        allow="autoplay; fullscreen; picture-in-picture"
                                                                        allowfullscreen
                                                                    ></iframe>
                                                                </div>
                                                                <div class="curtain"></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                    $counter++;
                                                endwhile;
                                                ?>
                                            </div>
                                            <?php
                                        endif;
                                    endwhile;
                                endif;
                            endif;

                            if( $select_grid == 'five' || $select_grid == '2 img or video' ):
                                if( have_rows('2_grid') ): 
                                    while( have_rows('2_grid')): the_row();
                                        if( have_rows('grid_repeater') ):
                                            $class_names = ['img-M left2', 'img-S right-M-2'];
                                            ?>
                                            <div class="wraper-grid-4" data-scroll-section>
                                                <?php 
                                                $counter = 0;
                                                while( have_rows('grid_repeater') ): the_row();
                                                    $choose_img_or_video = get_sub_field('choose_img_or_video');
                                                    $image = get_sub_field('img');
                                                    $video = get_sub_field('video');
                                                    
                                                    $current_class = isset($class_names[$counter]) ? $class_names[$counter] : '';
                            
                                                    ?>
                                                    <div class="<?php echo esc_attr($current_class); ?>" data-scroll>
                                                        <?php if (strtolower($choose_img_or_video) == 'img' && !empty($image)): ?>
                                                            <?php 
                                                            if (is_array($image)) {
                                                                $image_url = esc_url($image['url']);
                                                                $image_alt = esc_attr($image['alt']);
                                                            } else {
                                                                $image_url = esc_url($image);  
                                                                $image_alt = ''; 
                                                            }
                                                            ?>
                                                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                                                                <div class="curtain"></div>
                                                            </div>
                                                            <!-- <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>"> -->
                                                        <?php elseif (strtolower($choose_img_or_video) == 'video' && !empty($video)): ?>
                                                            <div class="video-wrap">
                                                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                                                <div class="plyr__video-embed">
                                                                    <iframe
                                                                        src="https://player.vimeo.com/video/<?php echo esc_attr($video); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                                                        allow="autoplay; fullscreen; picture-in-picture"
                                                                        allowfullscreen
                                                                    ></iframe>
                                                                </div>
                                                                <div class="curtain"></div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                    $counter++;
                                                endwhile;
                                                ?>
                                            </div>
                                            <?php
                                        endif;
                                    endwhile;
                                endif;
                            endif;
                            
                        endwhile; 
                    endif; 
                endwhile; 
            endif; 
            ?>

            <?php
            $current_id = get_the_ID();
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            <div class="project-pagination <?php if (!$prev_post) echo 'no-prev'; ?>" data-scroll-section>
                <?php if ($prev_post): ?>
                    <div class="wraper-pagination" data-scroll>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="prev-project">
                            <p class="back" data-scroll>Back</p>
                            <p class="next-title" data-scroll><?php echo get_the_title($prev_post->ID); ?></p>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($next_post): ?>
                    <div class="wraper-pagination-1" data-scroll>
                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="next-project">
                            <p class="back" data-scroll>Next</p>
                            <p class="next-title" data-scroll><?php echo get_the_title($next_post->ID); ?></p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> 






