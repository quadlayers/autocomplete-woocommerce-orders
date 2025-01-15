<?php

/**
 * Plugin Name:             Autocomplete WooCommerce Orders
 * Plugin URI:              https://wordpress.org/plugins/autocomplete-woocommerce-orders/
 * Description:             Autocomplete your WooCommerce orders with ease. This plugins works with most major payment providers including PayPal, SagePay and Stripe.
 * Version:                 3.3.8
 * Text Domain:             autocomplete-woocommerce-orders
 * Author:                  QuadLayers
 * Author URI:              https://quadlayers.com
 * License:                 GPLv3
 * Domain Path:             /languages
 * Request at least:        4.7
 * Tested up to:            6.7
 * Requires PHP:            5.6
 * WC requires at least:    4.0
 * WC tested up to:         9.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *   Definition globals variables
 */
define( 'ACO_PLUGIN_NAME', 'Autocomplete WooCommerce Orders' );
define( 'ACO_PLUGIN_VERSION', '3.3.8' );
define( 'ACO_PLUGIN_FILE', __FILE__ );
define( 'ACO_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'ACO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'ACO_PREFIX', 'aco' );
define( 'ACO_WORDPRESS_URL', 'https://wordpress.org/plugins/autocomplete-woocommerce-orders/' );
define( 'ACO_DOCUMENTATION_URL', 'https://quadlayers.com/documentation/woocommerce-autocomplete-orders/?utm_source=aco_admin' );
define( 'ACO_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=aco_admin' );
define( 'ACO_PREMIUM_SELL_URL', 'https://quadlayers.com/products/woocommerce-autocomplete-orders/?utm_source=aco_admin' );

/**
 * Load composer autoload
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Load composer packages
 */
require_once __DIR__ . '/vendor_packages/wp-i18n-map.php';
require_once __DIR__ . '/vendor_packages/wp-dashboard-widget-news.php';
require_once __DIR__ . '/vendor_packages/wp-plugin-table-links.php';
require_once __DIR__ . '/vendor_packages/wp-notice-plugin-required.php';
require_once __DIR__ . '/vendor_packages/wp-notice-plugin-promote.php';
require_once __DIR__ . '/vendor_packages/wp-plugin-suggestions.php';
require_once __DIR__ . '/vendor_packages/wp-plugin-install-tab.php';

/**
 * Load plugin classes
 */
require_once __DIR__ . '/lib/class-plugin.php';

/**
 * Plugin activation hook
 */
register_activation_hook(
	__FILE__,
	function () {
		do_action( 'aco_activation' );
	}
);

/**
 * Plugin activation hook
 */
register_deactivation_hook(
	__FILE__,
	function () {
		do_action( 'aco_deactivation' );
	}
);

/**
 * Declarate compatibility with WooCommerce Custom Order Tables
 */
add_action(
	'before_woocommerce_init',
	function () {
		if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	}
);
