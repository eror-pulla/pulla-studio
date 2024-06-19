<?php 
function get_banner_images() {
    // Fetch the banner group field
    $banner = get_field('banner');
    if (!$banner || !isset($banner['image']) || !is_array($banner['image'])) {
        return array();
    }

    $images = $banner['image']; // Directly assign to $images variable

    // Get the options field
    $options = $banner['options'];

    if ($options === 'Random Images') {
        // Shuffle the images array and pick the first 3
        shuffle($images);
        $images = array_slice($images, 0, 3);
    } else {
        // Get the first 3 images in their original order
        $images = array_slice($images, 0, 3);
    }

    // Extract the image URLs
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

// Get the banner images
$images = get_banner_images();
?>

<section class="banner">
    <div class="inside-banner">
        <div class="wraper-banner">
            <div class="wraper-img-banner">
                <?php if (!empty($images)): ?>
                    <?php foreach ($images as $index => $image_url): ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="Banner Image <?php echo ($index + 1); ?>" class="img-<?php echo ($index + 1); ?>">
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images available.</p>
                <?php endif; ?>
            </div>
            <div class="wraper-content-banner">
                <h1><?php echo esc_html($banner['title']); ?><br><b class='break-text'><?php echo esc_html($banner['title_break']); ?></b></h1>
                <p><?php echo esc_html($banner['subtitle']); ?></p>
            </div>
        </div>
    </div>
</section>
