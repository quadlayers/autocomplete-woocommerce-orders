<?php
/**
 * Plugin Name: Autocomplete WooCommerce Orders
 * Plugin URI: https://wordpress.org/plugins/autocomplete-woocommerce-orders/
 * Description: Autocomplete your WooCommerce orders with ease. This plugins works with most major payment providers including PayPal, SagePay and Stripe.
 * Version: 1.1.0
 * Author: Liam McArthur
 * Author URI: https://www.silkwave.co.uk
 * Text Domain: autocomplete-woocommerce-orders.
 *
 * WC requires at least: 2.3
 * WC tested up to: 3.5.2
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// Include the main ACO class.
if (!class_exists('ACO')) {
    include_once dirname(__FILE__).'/includes/class-aco.php';
}

/**
 * Main instance of ACO.
 *
 * Returns the main instance of ACO to prevent the need to use globals.
 *
 * @since  1.0
 *
 * @return ACO
 */
function aco()
{
    return ACO::instance();
}

aco();
