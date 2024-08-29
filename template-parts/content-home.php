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
    <div class="inside-banner" >
        <div class="wraper-banner">
        <div class="wraper-img-banner">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $index => $image_url): ?>
                    <img 
                        src="<?php echo esc_url($image_url); ?>" 
                        alt="Banner Image <?php echo ($index + 1); ?>" 
                        class="img-<?php echo ($index + 1); ?>" 
                        data-scroll 
                        data-scroll-class="<?php echo ($index === 0) ? 'fade-in-up' : ($index === 1 ? 'fade-in-left' : 'fade-in-right'); ?>" 
                        data-scroll-delay="<?php echo ($index * 0.3); ?>"
                    >
                <?php endforeach; ?>
            <?php else: ?>
                <p>No images available.</p>
            <?php endif; ?>
        </div>
            <div class="wraper-content-banner" data-scroll data-scroll-class="fade-in-text">
                <h1><?php echo esc_html($banner['title']); ?><br><b class='break-text'><?php echo esc_html($banner['title_break']); ?></b></h1>
                <p><?php echo esc_html($banner['subtitle']); ?></p>
            </div>
        </div>
    </div>
</section>
