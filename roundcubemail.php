<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/jrdevelopr
 * @since             1.0.0
 * @package           Roundcubemail
 *
 * @wordpress-plugin
 * Plugin Name:       RoundCube Mail
 * Plugin URI:        https://github.com/jrdevelopr/roundcubemail
 * Description:       Email and correspond with your customers right inside the dashboard of WordPress using Roundcube Mail.
 * Version:           1.0.0
 * Author:            Jr Developr
 * Author URI:        https://github.com/jrdevelopr
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       roundcubemail
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
define( 'ROUNDCUBEMAIL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-roundcubemail-activator.php
 */
function activate_roundcubemail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-roundcubemail-activator.php';
	Roundcubemail_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-roundcubemail-deactivator.php
 */
function deactivate_roundcubemail() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-roundcubemail-deactivator.php';
	Roundcubemail_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_roundcubemail' );
register_deactivation_hook( __FILE__, 'deactivate_roundcubemail' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-roundcubemail.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_roundcubemail() {

	$plugin = new Roundcubemail();
	$plugin->run();

}
run_roundcubemail();

// Add Page Link to Admin Dashboard

function roundcubemail_menu() {
		add_menu_page(
			__( 'Roundcube Mail', 'my-textdomain' ),
			__( 'Roundcube Mail', 'my-textdomain' ),
			'edit_posts',
			'roundcubemail',
			'roundcubemail_contents',
			'dashicons-email-alt',
			3
		);
	}

	add_action( 'admin_menu', 'roundcubemail_menu' );


	function roundcubemail_contents() {
		?>
		<h2>This is just a demo image of how the final product is expected to look - remove for production</h2>
<div>
	<img  style="width: 1000px;" src="<?php echo plugin_dir_url( __FILE__ ) . 'images/roundcube.png'; ?>">
</div>


		<?php
	}
