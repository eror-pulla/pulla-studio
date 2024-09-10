<?php 

$we_are = get_field('we_are');
$title = $we_are['title'];
$text_left = $we_are['text_left'];
$text_right = $we_are['text_right'];

?>


<section class="we-are"  data-scroll-section>
    <div class="wrap-we-are">
        <div class="inside-we-are" data-scroll>
            <p> / WE ARE /</p>
            <div class="wraper-inside-text">
                <h5><?php echo $title ?></h5>
                <div class="texts">
                    <p class="left-right"><?php echo $text_left ?></p>
                    <p class="left-right"><?php echo $text_right ?></p>
                </div>
            </div>
        </div>
        <div class="imgs">
            <?php 
            if( have_rows('we_are') ): 
                $count = 1; 
                while( have_rows('we_are') ): the_row(); 
                    if( have_rows('repeater_img') ): 
                        while( have_rows('repeater_img') ): the_row(); 
                            $img_url = get_sub_field('img'); 
                            
                            if( !empty($img_url) ): ?>
                                <img class="img-<?php echo $count; ?>-comp" data-scroll src="<?php echo esc_url($img_url); ?>" alt="Image <?php echo $count; ?>">
                                <?php $count++; ?>
                            <?php endif; 
                        endwhile; 
                    else: 
                        echo '<p>No repeater_img found</p>';
                    endif; 
                endwhile; 
            else: 
                echo '<p>No we_are rows found</p>';
            endif; 
            ?>
        </div>
    </div>
</section>