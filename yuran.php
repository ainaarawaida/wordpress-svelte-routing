<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://yuran
 * @since             1.0.0
 * @package           Yuran
 *
 * @wordpress-plugin
 * Plugin Name:       yuran
 * Plugin URI:        https://yuran
 * Description:       yuran
 * Version:           1.0.0
 * Author:            yuran
 * Author URI:        https://yuran
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       yuran
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
define( 'YURAN_VERSION', '1.0.0' );
define( 'YURAN_PATH', plugin_dir_path( __FILE__ ) );
define( 'YURAN_URL', plugins_url('yuran') );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yuran-activator.php
 */
function activate_yuran() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yuran-activator.php';
	Yuran_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yuran-deactivator.php
 */
function deactivate_yuran() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yuran-deactivator.php';
	Yuran_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yuran' );
register_deactivation_hook( __FILE__, 'deactivate_yuran' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-yuran.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_yuran() {

	$plugin = new Yuran();
	$plugin->run();

}
run_yuran();

function deb($data){
	print_r("<pre>");
	print_r($data);
}
