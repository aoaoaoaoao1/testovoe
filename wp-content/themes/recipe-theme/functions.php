<?php


// Enqueue front-end styles
add_action('wp_enqueue_scripts', function() {
    if (is_singular('recipe')) {
        wp_enqueue_style(
            'recipe-style',
            get_stylesheet_directory_uri() . '/assets/css/recipe.css',
            [],
            '1.0'
        );
    }
});

function recipe_theme_svg_icon($name, $class = '') {
    $file = get_stylesheet_directory() . "/assets/icons/icon-{$name}.svg";
    if (file_exists($file)) {
        $svg = file_get_contents($file);
        if ($class) {
            $svg = preg_replace('/<svg /', '<svg class="' . esc_attr($class) . '" ', $svg, 1);
        }
        return $svg;
    }
    return '';
}
