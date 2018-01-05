<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://github.com/regisphilibert/wp-for-your-eyes-only
 * @since             1.0.0
 * @package           For Your Eyes Only
 *
 * @wordpress-plugin
 * Plugin Name:       For Your Eyes Only
 * Description:       A Wordpress plugin to show beaufitul print_r and other to selected users (not based on capabilites).
 * Version:           1.0.0
 * Author:            Regis Philibert
 * Author URI:        https://regisphilibert.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
     die;
}

require "admin/Submenu.class.php";
require "admin/SubmenuPage.class.php";
require "admin/Serializer.class.php";
require "admin/Deserializer.class.php";

require "components/Component.class.php";
require "components/Alert/Alert.class.php";
require "components/Sticky/Sticky.class.php";

add_action( 'plugins_loaded', 'fyeo_init' );
/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function fyeo_init() {
	$serializer = new jsSerializer();
	$serializer->init();

	$deserializer = new jsDeserializer();

	$fyeo = new jsSubmenu( new jsSubmenuPage($deserializer));
	$fyeo->init();
}