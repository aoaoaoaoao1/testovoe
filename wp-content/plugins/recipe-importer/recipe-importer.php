<?php
/*
Plugin Name: Recipe Importer
Description: Custom post type, ACF fields, and API import for recipes.
Version: 1.0
Author: Maxim
Requires Plugins: Advanced Custom Fields
*/

if (!defined('ABSPATH')) exit;

// Define plugin path
define('RECIPE_IMPORTER_PATH', plugin_dir_path(__FILE__));

// Include core files
require_once RECIPE_IMPORTER_PATH . 'inc/cpt/cpt.php';
require_once RECIPE_IMPORTER_PATH . 'inc/cpt/taxonomies.php';
require_once RECIPE_IMPORTER_PATH . 'inc/acf/acf-fields.php';
require_once RECIPE_IMPORTER_PATH . 'inc/import/admin-import.php';
require_once RECIPE_IMPORTER_PATH . 'inc/import/importer.php';
