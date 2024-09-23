<?php 
function get_banner_images() {
    $banner = get_field('banner');
    if (!$banner || !isset($banner['image']) || !is_array($banner['image'])) {
        return array();
    }
    $images = $banner['image']; 
    $options = $banner['options'];

    if ($options === 'Random Images') {
        shuffle($images);
        $images = array_slice($images, 0, 3);
    } else {
        $images = array_slice($images, 0, 3);
    }

    $image_urls = array();
    foreach ($images as $image_field) {
        if (isset($image_field['img'])) {
            $image_urls[] = $image_field['img'];
        }
    }
    return $image_urls;
}


?>
<?php
// Template Name: Home

// Fetch ACF fields
$banner = get_field('banner');
$options=$banner['options'];
$title = $banner['title'] ?? '';
$title_break = $banner['title_break'] ?? '';
$subtitle = $banner['subtitle'] ?? '';

$images = get_banner_images();
?>

<section class="banner" data-scroll-section>
    <div class="inside-banner">
        <div class="wraper-banner">
            <div class="wraper-img-banner">
                <?php if (!empty($images)): ?>
                    <?php foreach ($images as $index => $image_url): 
                        $scrollClasses = ($index === 0) ? 'fade-in-up' : ($index === 1 ? 'fade-in-left' : 'fade-in-right');
                    ?>
                    <div class="brick-<?php echo $index ?>" data-scroll>
                        <div class="above-img-brick-<?php echo $index ?>" data-scroll data-scroll-speed="-2">
                            <img 
                                src="<?php echo esc_url($image_url); ?>" 
                                alt="Banner Image <?php echo esc_attr($index + 1); ?>" 
                                class="img-<?php echo esc_attr($index + 1); ?>-home"
                            >
                            <div class="curtain"></div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images available.</p>
                <?php endif; ?>
            </div>
            <div class="wraper-content-banner" data-scroll>
                <?php if (!empty($title)): ?>
                    <div class="split-lines">
                        <h1 class="title-1" data-scroll ><?php echo esc_html($title); ?></h1>
                    </div>
                    <div class="split-lines">
                        <h1 class='break-text' data-scroll><?php echo esc_html($title_break); ?></h1>
                    </div>
                <?php endif; ?>
                <?php if (!empty($subtitle)): ?>
                    <p data-scroll><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
