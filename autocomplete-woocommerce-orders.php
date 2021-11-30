<?php

/**
 * Plugin Name: Autocomplete WooCommerce Orders
 * Plugin URI:  https://wordpress.org/plugins/autocomplete-woocommerce-orders/
 * Description: Autocomplete your WooCommerce orders with ease. This plugins works with most major payment providers including PayPal, SagePay and Stripe.
 * Version:     1.4.6
 * Author:      QuadLayers
 * Author URI:  https://quadlayers.com
 * License:     GPLv3
 * Text Domain: autocomplete-woocommerce-orders
 * Domain Path:       /languages
 * WC requires at least: 3.1.0
 * WC tested up to: 5.9
 */


define('ACO_PLUGIN_NAME', 'Autocomplete WooCommerce Orders');

define('ACO_PLUGIN_VERSION', '1.4.6');

define('ACO_PLUGIN_FILE', __FILE__);

define('ACO_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR);

define('ACO_PREFIX', 'aco');

define('ACO_WORDPRESS_URL', 'https://wordpress.org/plugins/autocomplete-woocommerce-orders/');

define('ACO_REVIEW_URL', 'https://wordpress.org/support/plugin/autocomplete-woocommerce-orders/reviews/?filter=5#new-post');

define('ACO_DOCUMENTATION_URL', 'https://quadlayers.com/documentation/woocommerce-autocomplete-orders/?utm_source=aco_admin');

define('ACO_DEMO_URL', 'https://quadlayers.com/portfolio/woocommerce-autocomplete-orders/?utm_source=aco_admin');

define('ACO_PURCHASE_URL', ACO_DEMO_URL);

define('ACO_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=aco_admin');

define('ACO_GROUP_URL', 'https://www.facebook.com/groups/quadlayers');

// Include the main ACO class.
if (!class_exists('ACO')) {
	include_once dirname(__FILE__) . '/includes/class-aco.php';
}

if (!class_exists('QL_Widget')) {
	include_once(ACO_PLUGIN_DIR . 'includes/quadlayers/widget.php');
}


/**
 * Main instance of ACO.
 *
 * Returns the main instance of ACO to prevent the need to use globals.
 *
 * @since  1.0
 * @return ACO
 */

function aco()
{
	return ACO::instance();
}

aco();
