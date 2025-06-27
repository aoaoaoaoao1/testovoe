<?php

add_action('init', function() {
    register_taxonomy('meal_type', 'recipe', [
        'label' => __('Meal Types', 'recipe-importer'),
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);
    register_taxonomy('recipe_tag', 'recipe', [
        'label' => __('Tags', 'recipe-importer'),
        'hierarchical' => false,
        'show_in_rest' => true,
    ]);
});