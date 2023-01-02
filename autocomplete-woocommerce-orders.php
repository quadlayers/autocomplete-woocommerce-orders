<?php

/**
 * Plugin Name: Autocomplete WooCommerce Orders
 * Plugin URI:  https://wordpress.org/plugins/autocomplete-woocommerce-orders/
 * Description: Autocomplete your WooCommerce orders with ease. This plugins works with most major payment providers including PayPal, SagePay and Stripe.
 * Version:     2.0.1
 * Author:      QuadLayers
 * Author URI:  https://quadlayers.com
 * License:     GPLv3
 * Text Domain: autocomplete-woocommerce-orders
 * Domain Path:       /languages
 * WC requires at least: 3.1.0
 * WC tested up to: 7.0
 */


define( 'ACO_PLUGIN_NAME', 'Autocomplete WooCommerce Orders' );
define( 'ACO_PLUGIN_VERSION', '2.0.1' );
define( 'ACO_PLUGIN_FILE', __FILE__ );
define( 'ACO_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'ACO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'ACO_PREFIX', 'aco' );
define( 'ACO_WORDPRESS_URL', 'https://wordpress.org/plugins/autocomplete-woocommerce-orders/' );
define( 'ACO_REVIEW_URL', 'https://wordpress.org/support/plugin/autocomplete-woocommerce-orders/reviews/?filter=5#new-post' );
define( 'ACO_DOCUMENTATION_URL', 'https://quadlayers.com/documentation/woocommerce-autocomplete-orders/?utm_source=aco_admin' );
define( 'ACO_DEMO_URL', 'https://quadlayers.com/portfolio/woocommerce-autocomplete-orders/?utm_source=aco_admin' );
define( 'ACO_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=aco_admin' );
define( 'ACO_GROUP_URL', 'https://www.facebook.com/groups/quadlayers' );

define( 'ACO_PREMIUM_SELL_SLUG', 'autocomplete-woocommerce-orders-pro' );
define( 'ACO_PREMIUM_SELL_NAME', 'Autocomplete WooCommerce Orders PRO' );
define( 'ACO_PREMIUM_SELL_URL', 'https://quadlayers.com/portfolio/woocommerce-autocomplete-orders/?utm_source=aco_admin' );

define( 'ACO_CROSS_INSTALL_SLUG', 'woocommerce-checkout-manager' );
define( 'ACO_CROSS_INSTALL_NAME', 'Checkout Manager' );
define( 'ACO_CROSS_INSTALL_DESCRIPTION', esc_html__( 'Checkout Field Manager( Checkout Manager ) for WooCommerce allows you to add custom fields to the checkout page, related to billing, Shipping or Additional fields sections.', 'autocomplete-woocommerce-orders' ) );
define( 'ACO_CROSS_INSTALL_URL', 'https://quadlayers.com/portfolio/woocommerce-checkout-manager/?utm_source=aco_admin' );


// Include the main ACO class.
if ( ! class_exists( 'ACO' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-aco.php';
}

require_once ACO_PLUGIN_DIR . 'includes/quadlayers/widget.php';
require_once ACO_PLUGIN_DIR . 'includes/quadlayers/notices.php';
require_once ACO_PLUGIN_DIR . 'includes/quadlayers/links.php';

/**
 * Main instance of ACO.
 *
 * Returns the main instance of ACO to prevent the need to use globals.
 *
 * @since  1.0
 * @return ACO
 */

function aco() {
	return ACO::instance();
}

aco();
