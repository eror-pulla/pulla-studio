<?php
$project_count = wp_count_posts('project')->publish;

?>

<section class="banner1">
    <div class="wraper-banner">
        <div class="inside-banner">
            <div class="text-wrap">
                <div class="cases-text">
                    <h1>Our  cASES</h1><p class="nr-cses">(<?php echo $project_count; ?>)</p>
                </div>
                <!-- <p class="scroll"><a href="">Scroll</a></p> -->
                 <button class="scroll">Scroll</button>
            </div>
            <div class="img-wrap">
            <img src="<?php echo get_template_directory_uri() . '/imgs/Rectangle-4.png'; ?>" alt="">
            </div>
        </div>
    </div>
</section>

