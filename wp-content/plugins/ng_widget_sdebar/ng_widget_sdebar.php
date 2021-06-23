<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/gabriel-nicula-48a450ba/
 * @since             1.0.0
 * @package           Ng_widget_sdebar
 *
 * @wordpress-plugin
 * Plugin Name:       N.G. Widget Sidebar
 * Plugin URI:        https://www.linkedin.com/in/gabriel-nicula-48a450ba/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nicula Gabriel
 * Author URI:        https://www.linkedin.com/in/gabriel-nicula-48a450ba/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ng_widget_sdebar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NG_WIDGET_SDEBAR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ng_widget_sdebar-activator.php
 */
function activate_ng_widget_sdebar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ng_widget_sdebar-activator.php';
	Ng_widget_sdebar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ng_widget_sdebar-deactivator.php
 */
function deactivate_ng_widget_sdebar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ng_widget_sdebar-deactivator.php';
	Ng_widget_sdebar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ng_widget_sdebar' );
register_deactivation_hook( __FILE__, 'deactivate_ng_widget_sdebar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ng_widget_sdebar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ng_widget_sdebar() {

	$plugin = new Ng_widget_sdebar();
	$plugin->run();

}
run_ng_widget_sdebar();
