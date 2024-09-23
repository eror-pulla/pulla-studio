<?php 
$banner_img = get_field('img_banner');
?>

<section class="company">
    <div class="wraper-company">
        <div class="inside-company">
            <div class="text-wrap">
                <div class="split-lines">
                    <h1 class="crack" data-scroll>MoRE ABouT </h1>
                </div>
                <div class="split-lines">
                    <h1 class='break-text' data-scroll> <p>/ Text /</p> Our cOmpany </h1>
                </div>
            </div>
            <div class="img-wraper">
            <div class="wrap-brick" data-scroll>
                <div class="brick-img" data-scroll data-scroll-speed="-2">
                    <img src="<?php echo $banner_img?>" alt="">
                    <div class="curtain"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>