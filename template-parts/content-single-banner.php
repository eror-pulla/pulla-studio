<section class="single-banner" data-scroll-section>
    <div class="inside-single-banner">
        <div class="split-lines">
            <h1 data-scroll><?php the_title(); ?></h1>
        </div>
        <div class="wraper-single-banner">
            <div class="video-wraper" data-scroll>
                <?php
                $banner_single = get_field('banner_single');
                if ($banner_single && isset($banner_single['img_or_video'])):
                    $img_or_video = $banner_single['img_or_video'];
                    if ($img_or_video === 'one' && isset($banner_single['image'])):
                        $image_url = $banner_single['image'];
                        if (!empty($image_url)):
                ?>
                        <div class="img-wraper">
                            <div class="brick-img" data-scroll data-scroll-speed="-2">
                                <img src="<?php echo esc_url($image_url); ?>" alt="Banner Image">
                                <div class="curtain"></div>
                            </div>
                        </div>
                <?php 
                        endif;
                    elseif ($img_or_video === 'two' && isset($banner_single['video_id_name'])):
                        $video_id_name = $banner_single['video_id_name'];
                        if (!empty($video_id_name)): 
                ?>
                        <div class="plyr__video-embed" id="player">
                            <iframe
                                src="https://player.vimeo.com/video/<?php echo esc_attr($video_id_name); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                allow="autoplay; fullscreen; picture-in-picture"
                                allowfullscreen
                            ></iframe>
                        </div>
                <?php 
                        endif;
                    endif;
                else:
                    echo '<p>No valid Image or Video selected.</p>';
                endif;
                ?>
            </div>
            <div class="text-wrap" data-scroll>
                <?php 
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<p class="cat" data-scroll>' . esc_html($categories[0]->name) . '</p>'; 
                }
                ?>
                <p class="date" data-scroll><?php echo esc_html($banner_single['date']); ?></p> 
                <p class="text" data-scroll><?php echo esc_html($banner_single['description']); ?></p>
            </div>
        </div>
    </div>
</section>
