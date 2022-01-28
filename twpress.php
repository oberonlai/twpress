<?php

/**
 * Tailwind CSS Play CDN for WordPress
 *
 * @link              https://oberonlai.blog
 * @since             0.0.1
 * @package           TWP
 *
 * @wordpress-plugin
 * Plugin Name:       Tailwind CSS Play CDN for WordPress
 * Plugin URI:        https://oberonlai.blog
 * Description:       Use the Play CDN to try Tailwind right in the WordPress without any build step. The Play CDN is designed for development purposes only, and is not the best choice for production.
 * Version:           0.0.1
 * Author:            Oberon Lai
 * Author URI:        https://oberonlai.blog
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       twp
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || exit;

define( 'TWP_VERSION', '0.0.1' );
define( 'TWP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'TWP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'TWP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Autoload
 */
require_once TWP_PLUGIN_DIR . 'vendor/autoload.php';
\A7\autoload( TWP_PLUGIN_DIR . 'src' );
