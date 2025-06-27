<?php

// Add Recipe Import admin page
add_action('admin_menu', function() {
    add_menu_page(
        __('Recipe Import', 'recipe-importer'),
        __('Recipe Import', 'recipe-importer'),
        'manage_options',
        'recipe-import',
        'recipe_import_page'
    );
});

// Register settings for importer URL and Access Key
add_action('admin_init', function() {
    register_setting('recipe_import_settings', 'recipe_import_access_url');
    register_setting('recipe_import_settings', 'recipe_import_access_key');
});

// Render admin page
function recipe_import_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Recipe Import', 'recipe-importer'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('recipe_import_settings'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Import URL</th>
                    <td><input type="url" required name="recipe_import_access_url" value="<?php echo esc_attr(get_option('recipe_import_access_url', '')); ?>" size="60" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Import Access Key</th>
                    <td><input type="text" required name="recipe_import_access_key" value="<?php echo esc_attr(get_option('recipe_import_access_key', '')); ?>" size="60" /></td>
                </tr>
            </table>
            <?php submit_button('Save Settings'); ?>
        </form>
        <hr />
        <button id="import-recipes" class="button button-primary"><?php esc_html_e('Import/Update Recipes', 'recipe-importer'); ?></button>
        <div id="import-status"></div>
    </div>
    <script>
    document.getElementById('import-recipes').addEventListener('click', function() {
        var status = document.getElementById('import-status');
        status.innerHTML = 'Importing...';
        fetch(ajaxurl + '?action=lovable_import_recipes&_wpnonce=<?php echo wp_create_nonce('lovable_import'); ?>')
            .then(r => r.json())
            .then(data => status.innerHTML = data.message);
    });
    </script>
    <?php
}

// AJAX handler
add_action('wp_ajax_lovable_import_recipes', function() {
    check_ajax_referer('lovable_import');
    if (!current_user_can('manage_options')) {
        wp_send_json_error(['message' => 'Unauthorized'], 403);
    }
    $result = lovable_import_recipes();
    wp_send_json(['message' => $result]);
});