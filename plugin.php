<?php
/*
Plugin Name: Black Market Block Library 🏴‍☠️
Plugin URI: https://github.com/4Columns-Jordan/Black-Market-Block-Library
Description: The unofficial block library for the 4C theme
Version: 1.0
Author: Jordan Dossett
Author URI: https://github.com/4Columns-Jordan
*/

function BML__check_load_point($paths){
  $paths[] = plugin_dir_path(__FILE__) . 'acf-json-blocks';
  return $paths;
}

// =============================================================================
// Register blocks here ============================================================
add_action('acf/init', 'BML__init_blocks');
function BML__init_blocks()
{
  if (function_exists('acf_register_block_type')) {
    acf_register_block_type([
        'name'            => 'expandSection',
        'title'           => __('Expand Section'),
        'description'     => __('A container that starts out contaner width but then goes full width on page scroll'),
        'render_template' => plugin_dir_path( __FILE__ ) . 'blocks/expand-section/block.php',
        'enqueue_style'   => plugins_url('/blocks/expand-section/index.css', __FILE__),
        'enqueue_script'  => plugins_url('/blocks/expand-section/index.js', __FILE__),
        'enqueue_assets'  => function(){
          
        },
        'icon'     => 'editor-alignleft',
        'keywords' => ['content', 'image'],
        'supports' => ['jsx' => true]
    ]);
    acf_register_block_type([
      'name'        => 'mosaicBlock',
      'title'       => __('Mosaic Block'),
      'description' => __('A mosaic Block'),
      'render_template' => plugin_dir_path( __FILE__ ) . 'blocks/mosaic-grid/block.php',
      'enqueue_style' => plugins_url('/blocks/mosaic-grid/index.css', __FILE__),
      'enqueue_assets' => function(){
        
      },
      'icon'            => 'editor-alignleft',
      'keywords'        => ['content', 'image'],
    ]);
  }
}