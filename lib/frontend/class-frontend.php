<?php
/**
 * ACO Frontend
 *
 * @package  Autocomplete Woocommerce Orders
 * @since    2.0.0
 */

namespace QuadLayers\ACO\Frontend;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Frontend Class.
 */
class Frontend {


	/**
	 * ID.
	 *
	 * @var ACO
	 */
	public $id = 'silkwave_aco';

	/**
	 * Construct
	 */
	public function __construct() {
		add_filter( 'woocommerce_payment_complete_order_status', array( $this, 'autocomplete_orders' ), -1, 2 );
	}

	/**
	 * Function autocomplete_orders
	 *
	 * @param string  $order_status Order Status.
	 * @param integer $order_id Order ID.
	 * @return string
	 */
	public function autocomplete_orders( $order_status, $order_id ) {
		$mode = get_option( 'wc_' . $this->id . '_mode' );

		switch ( $mode ) {
			case 'off':
				$order_status = 'processing';
				break;
			case 'all':
			case 'paid':
				$order_status = 'completed';
				break;
			case 'virtual':
				$order = wc_get_order( $order_id );

				if ( $order && 'processing' === $order_status && in_array( $order->get_status(), array( 'pending', 'on-hold', 'failed' ), true ) ) {

					$virtual = false;
					$items   = $order->get_items();

					if ( count( $items ) > 0 ) {
						foreach ( $items  as $item ) {
							if ( is_callable( array( $item, 'get_product' ) ) ) {
								$product = $item->get_product();
							} elseif ( is_callable( array( $order, 'get_product_from_item' ) ) ) {
								$product = $order->get_product_from_item( $item );
							} else {
								$product = null;
							}

							if ( ! $product->is_virtual() ) {
								$virtual = false;
								break;
							}
							$virtual = true;
						}
					}
					if ( $virtual ) {
						$order_status = 'completed';
					}
				}
				break;
				/**
				 * Preserve WooCommerce core functionality for virtual and downloadable products.
				 */
			case 'virtual_downloadable':
				$order_status = 'completed' === $order_status ? 'completed' : 'processing';
				break;
		}
		return $order_status;
	}
}
