<?php

add_action('acf/init', function() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group([
            'key' => 'group_recipe_fields',
            'title' => 'Recipe Fields',
            'fields' => [
                [
                    'key' => 'field_prep_time',
                    'label' => 'Prep Time',
                    'name' => 'prep_time',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_cook_time',
                    'label' => 'Cook Time',
                    'name' => 'cook_time',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_difficulty',
                    'label' => 'Difficulty',
                    'name' => 'difficulty',
                    'type' => 'select',
                    'choices' => [
                        'Easy' => 'Easy',
                        'Medium' => 'Medium',
                        'Hard' => 'Hard',
                    ],
                ],
                [
                    'key' => 'field_servings',
                    'label' => 'Servings',
                    'name' => 'servings',
                    'type' => 'number',
                    'min' => 1,
                ],
                [
                    'key' => 'field_calories',
                    'label' => 'Calories',
                    'name' => 'calories',
                    'type' => 'number',
                    'min' => 0,
                ],
                [
                    'key' => 'field_rating',
                    'label' => 'Rating',
                    'name' => 'rating',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5,
                    'step' => 0.1,
                ],
                [
                    'key' => 'field_reviews',
                    'label' => 'Reviews',
                    'name' => 'reviews',
                    'type' => 'number',
                    'min' => 0,
                ],
                [
                    'key' => 'field_ingredients',
                    'label' => 'Ingredients',
                    'name' => 'ingredients',
                    'type' => 'repeater',
                    'sub_fields' => [
                        [
                            'key' => 'field_ingredient_name',
                            'label' => 'Ingredient',
                            'name' => 'ingredient_name',
                            'type' => 'text',
                        ],
                    ],
                ],
                [
                    'key' => 'field_instructions',
                    'label' => 'Instructions',
                    'name' => 'instructions',
                    'type' => 'repeater',
                    'sub_fields' => [
                        [
                            'key' => 'field_instruction_step',
                            'label' => 'Step',
                            'name' => 'step',
                            'type' => 'textarea',
                        ],
                    ],
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'recipe',
                    ],
                ],
            ],
        ]);
    }
});