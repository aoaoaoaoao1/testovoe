<?php
// Import recipes from external API
function lovable_import_recipes() {
    $url = get_option('recipe_import_access_url', '');
    $access_key = get_option('recipe_import_access_key', '');

    if (empty($url) || empty($access_key)) return 'No URL or access key found.';
    $args = [
        'headers' => [
            'X-Access-Key' => $access_key
        ]
    ];
    $response = wp_remote_get($url, $args);
    if (is_wp_error($response)) return 'API error.';

    $data = json_decode(wp_remote_retrieve_body($response), true);
    if (!$data || !isset($data['record']['recipes']) || !is_array($data['record']['recipes'])) return 'No recipes found.';

    $imported = 0;
    foreach ($data['record']['recipes'] as $recipe) {
        // Check if exists (by name/unique field)
        $existing = get_page_by_title($recipe['name'], OBJECT, 'recipe');
        $post_id = $existing ? $existing->ID : null;

        $post_data = [
            'post_title' => sanitize_text_field($recipe['name']),
            'post_type' => 'recipe',
            'post_status' => 'publish',
        ];
        if ($post_id) {
            $post_data['ID'] = $post_id;
            wp_update_post($post_data);
        } else {
            $post_id = wp_insert_post($post_data);
        }

        // Set taxonomies
        if (!empty($recipe['mealType'])) {
            wp_set_object_terms($post_id, array_map('sanitize_text_field', (array)$recipe['mealType']), 'meal_type');
        }
        if (!empty($recipe['tags'])) {
            wp_set_object_terms($post_id, array_map('sanitize_text_field', (array)$recipe['tags']), 'recipe_tag');
        }

        // Set ACF fields
        // Ingredients: convert array of strings to repeater format
        if (!empty($recipe['ingredients']) && is_array($recipe['ingredients'])) {
            $acf_ingredients = array_map(function($item) {
                return [ 'ingredient_name' => $item ];
            }, $recipe['ingredients']);
            update_field('ingredients', $acf_ingredients, $post_id);
        }
        // Instructions: convert array of strings to repeater format
        if (!empty($recipe['instructions']) && is_array($recipe['instructions'])) {
            $acf_instructions = array_map(function($item) {
                return [ 'step' => $item ];
            }, $recipe['instructions']);
            update_field('instructions', $acf_instructions, $post_id);
        }
        // Other fields
        update_field('prep_time', isset($recipe['prepTimeMinutes']) ? intval($recipe['prepTimeMinutes']) . ' mins' : '', $post_id);
        update_field('cook_time', isset($recipe['cookTimeMinutes']) ? intval($recipe['cookTimeMinutes']) . ' mins' : '', $post_id);
        update_field('servings', isset($recipe['servings']) ? intval($recipe['servings']) : '', $post_id);
        update_field('difficulty', isset($recipe['difficulty']) ? sanitize_text_field($recipe['difficulty']) : '', $post_id);
        update_field('calories', isset($recipe['caloriesPerServing']) ? intval($recipe['caloriesPerServing']) : '', $post_id);
        update_field('rating', isset($recipe['rating']) ? floatval($recipe['rating']) : '', $post_id);
        update_field('reviews', isset($recipe['reviewCount']) ? intval($recipe['reviewCount']) : '', $post_id);

        // Handle image
        if (!empty($recipe['image'])) {
            require_once ABSPATH . 'wp-admin/includes/image.php';
            require_once ABSPATH . 'wp-admin/includes/file.php';
            require_once ABSPATH . 'wp-admin/includes/media.php';
            $image_id = media_sideload_image($recipe['image'], $post_id, null, 'id');
            if (!is_wp_error($image_id)) {
                set_post_thumbnail($post_id, $image_id);
            }
        }

        $imported++;
    }
    return "Imported/Updated $imported recipes.";
}