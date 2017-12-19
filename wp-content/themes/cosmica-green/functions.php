<?php
function cosmica_green_theme_setup() {
    load_child_theme_textdomain( 'cosmica-green', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cosmica_green_theme_setup' );

function cosmica_green_register_scripts() {
    $parent_style = 'cosmica-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'cosmica-green-style', get_stylesheet_uri(), array( $parent_style ));
}
add_action('wp_enqueue_scripts', 'cosmica_green_register_scripts', 20);