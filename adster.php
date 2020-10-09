<?php

/**
 * Plugin Name:       adster
 * Plugin URI:        https://github.com/bnrosa
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Bernardo Rosa
 * Author URI:        https://github.com/bnrosa
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       adster
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'ADSTER_VERSION', '1.0.0' );


function activate_adster() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adster-activator.php';
	Adster_Activator::activate();
}

function deactivate_adster() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-adster-deactivator.php';
	Adster_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_adster' );
register_deactivation_hook( __FILE__, 'deactivate_adster' );

require plugin_dir_path( __FILE__ ) . 'includes/class-adster.php';

/**
 * Begins execution of the plugin.
 *
 */
function run_adster() {

	$plugin = new Adster();
	$plugin->run();

}
run_adster();
