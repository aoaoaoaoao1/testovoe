<?php


add_action('init', function() {
    register_post_type('recipe', [
        'label' => __('Recipes', 'recipe-importer'),
        'public' => true,
        'show_in_menu' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'recipes'],
        'show_in_rest' => true,
    ]);
});