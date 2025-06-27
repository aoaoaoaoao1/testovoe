# Recipe Importer Plugin

## Overview
This plugin allows you to import recipes as custom posts (type `recipe`) with taxonomies and ACF fields, including images, from structured data.

---

## Installation
1. Copy the `recipe-importer` folder to your WordPress `wp-content/plugins/` directory.
2. Make sure Advanced Custom Fields (ACF) Pro is installed and active (required for custom fields).
3. Activate the plugin in the WordPress admin panel (Plugins > Installed Plugins).

---

## Usage
1. Prepare your import data in the required format (see below).
2. Use the plugin's import functionality (see plugin UI or trigger import via code, depending on implementation).
3. Recipes will be created/updated as custom posts with all fields and images.

### Data Format Example
```json
{
  "record": {
    "recipes": [
      {
        "name": "Recipe Name",
        "mealType": ["Breakfast"],
        "tags": ["Easy", "Quick"],
        "ingredients": ["Eggs", "Milk"],
        "instructions": ["Step 1", "Step 2"],
        "prepTimeMinutes": 10,
        "cookTimeMinutes": 20,
        "servings": 2,
        "difficulty": "Easy",
        "caloriesPerServing": 200,
        "rating": 4.5,
        "reviewCount": 10,
        "image": "https://example.com/image.jpg"
      }
    ]
  }
}
```

---

## Notes
- If a recipe with the same name exists, it will be updated.
- Images are downloaded and set as the post thumbnail (may slow down import if many images).
- Custom fields are managed via ACF (repeater fields for ingredients/instructions, etc).
- Taxonomies `meal_type` and `recipe_tag` must exist (plugin or theme should register them).

---

## Troubleshooting
- If import is slow, try disabling image import or importing in smaller batches.
- Make sure your server allows file downloads and has enough resources for large imports.

---

## Uninstall
- Deactivate the plugin from the WordPress admin panel.
- Optionally, delete the plugin folder. 