<?php
// Enqueue styles and scripts
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'pixel-perfect-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version') );
    wp_enqueue_style( 'pixel-perfect-assets', get_template_directory_uri() . '/assets/style.css', [], wp_get_theme()->get('Version') );
    wp_enqueue_script( 'pixel-perfect-main', get_template_directory_uri() . '/assets/js/main.js', [], null, true );
});

add_action( 'after_setup_theme', function() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [ 'height' => 100, 'width' => 400, 'flex-width' => true, 'flex-height' => true ] );
    add_theme_support( 'automatic-feed-links' );
    load_theme_textdomain( 'pixel-perfect', get_template_directory() . '/languages' );
});

add_action( 'after_setup_theme', function() {
    register_nav_menus([
        'primary' => __( 'Primary Menu', 'pixel-perfect' ),
        'footer'  => __( 'Footer Menu', 'pixel-perfect' ),
    ]);
}); 