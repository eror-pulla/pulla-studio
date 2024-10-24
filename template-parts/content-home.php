
<?php
// Template Name: Home

// Fetch ACF fields
$banner = get_field('banner');
$title = $banner['title'] ?? '';
$subtitle = $banner['subtitle'] ?? '';
$paragraph = $banner['paragraph'] ?? '';
$video_id = $banner['video_id'] ?? '';
$video_id_mobile = $banner['video_id_mobile'] ?? '';


?>


<section class="home-banner" data-scroll-section>
    <div class="wrap-home-banner">
        <div class="inside-home-banner" data-scroll>
            <div class="autoplay-video" data-scroll>
                <iframe src="https://player.vimeo.com/video/<?php echo $video_id ?>?background=1&amp;autopause=0&amp;muted=1&amp;autoplay=1"
                    frameborder="0" autopause="0" allow="autoplay; picture-in-picture" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
                    style="position:absolute;top:0;left:0;width:100%;min-height:100vh" data-ready="true" class="iframe-vid">
                </iframe>
            </div>
            <div class="autoplay-video-mobile" data-scroll>
                <iframe src="https://player.vimeo.com/video/<?php echo $video_id_mobile ?>?background=1&amp;autopause=0&amp;muted=1&amp;autoplay=1"
                    frameborder="0" autopause="0" allow="autoplay; picture-in-picture" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen="" 
                    data-ready="true" class="iframe-vid-mobile">
                </iframe>
            </div>
            <div class="title-wrap-home">
                <div class="title-big">
                    <div class="split-lines">
                        <h1 data-scroll><?php echo $title ?></h1>
                    </div>
                        <h5 data-scroll><?php echo $subtitle ?></h5>
                </div>
            </div>
            <div class="bottom-wrap-home">
                <div class="wrap-bottom-home">
                    <button class="btn-explore" data-scroll>
                        <a href="<?php echo home_url('/cases/'); ?>">Explore</a>
                    </button>
                    <div class="bottom-text-wrap">
                        <div class="bottom-text" data-scroll>
                            <button class="button-scroll">
                                Scroll
                            </button>
                            <img src="<?php echo get_template_directory_uri() . '/imgs/arrow-down.svg'; ?>" >
                            <div class="split-lines">
                                <p data-scroll><?php echo $paragraph ?></p>
                            </div>
                            <img src="<?php echo get_template_directory_uri() . '/imgs/arrow-down.svg'; ?>" >
                            <button class="button-scroll-2">
                                Scroll
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



