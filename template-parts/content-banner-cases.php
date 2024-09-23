<?php
$project_count = wp_count_posts('project')->publish;

?>

<section class="banner1" data-scroll-section>
    <div class="wraper-banner">
        <div class="inside-banner">
            <div class="text-wrap" data-scroll>
                <div class="cases-text-project">
                    <div class="wraper-lines">
                        <div class="split-lines">
                            <h1 data-scroll class="word-1">Our</h1>
                        </div>
                        <div class="split-lines">
                            <h1 data-scroll class="word-2">cASES</h1>
                        </div>
                    </div>
                        <p class="nr-cses" data-scroll>(<?php echo $project_count; ?>)</p>
                </div>
                <!-- <p class="scroll"><a href="">Scroll</a></p> -->
                <div class="split-lines">
                    <button class="scroll" data-scroll><h6 data-scroll>Scroll</h6></button>
                </div>
            </div>
            <div class="img-wrap">
                <div class="wrap-brick" data-scroll>
                    <div class="brick-img" data-scroll data-scroll-speed="-2">
                        <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-4.png'; ?>" alt="">
                        <div class="curtain"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

