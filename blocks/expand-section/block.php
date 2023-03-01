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

$className = 'expandSection';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className = ' align' . $block['align'] . ' ' . $className;
}
// === Global Settings
include __DIR__ . ('/../globalSettings.php');

$borderColor = get_field('border_color') ?: '#fff';
$tbBorderWidth = get_field('top_border_width') ?: '128px';
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="--ES-bg-color: <?php echo $borderColor; ?>; --ES-tb-border-width: <?php echo $tbBorderWidth; ?>">
  <div class="expandSection__bg">
    <picture>
      <img src="<?php echo get_field('background_image')['url']; ?>" alt="">
    </picture>
    <div class="expandBorder expandSection__top"></div>
    <div class="expandBorder expandSection__right"></div>
    <div class="expandBorder expandSection__bottom"></div>
    <div class="expandBorder expandSection__left"></div>
  </div>
  <div class="container">
    <InnerBlocks />
  </div>
</section>