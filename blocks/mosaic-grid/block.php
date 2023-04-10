<?php

/**
 * Custom Block Template
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'custom-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.

$className = 'customBlock';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className = ' align' . $block['align'] . ' ' . $className;
}
wp_enqueue_script('mosaic-script', plugins_url('/mosaic.js', __FILE__), array('jquery'), '1.0', true);
wp_enqueue_script('mosaic-block', plugins_url('/index.js', __FILE__), array('jquery', 'mosaic-script'), '1.0', true);

$images = get_field('images');
// === Global Settings
include __DIR__ . ('/../globalSettings.php');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="grid">
        <div class="grid-sizer"></div>
        <?php foreach ($images as $image):
            $url = $image['url'];
            $alt = $image['alt']?: $image['title'];
        ?>
        <div class="grid-item">
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
        </div>
        <?php endforeach; ?>
    </div>

</section>