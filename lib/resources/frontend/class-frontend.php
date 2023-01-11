<?php

/**
 * ACO Admin
 *
 * @author   QuadLayers
 * @category ACO
 * @package  Autocomplete Woocommerce Orders
 * @since    2.0.0
 */

namespace QUADLAYERS\ACO\Resources\Frontend;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Frontend
{

	public $id = 'silkwave_aco';

	function __construct()
	{
		add_filter('woocommerce_payment_complete_order_status', array($this, 'autocomplete_orders'), -1, 2);
	}

	public function autocomplete_orders($order_status, $order_id)
	{
		$mode = get_option('wc_' . $this->id . '_mode');

		error_log('mode: ' . json_encode($mode, JSON_PRETTY_PRINT));

		switch ($mode) {
			case 'off':
				$order_status = 'processing';
				break;
			case 'all':
			case 'paid':
				$order_status = 'completed';
				break;
			case 'virtual':
				$order = wc_get_order($order_id);

				if ($order && $order_status === 'processing' && in_array($order->get_status(), array('pending', 'on-hold', 'failed'), true)) {

					$virtual = false;
					$items   = $order->get_items();

					if (count($items) > 0) {
						foreach ($items  as $item) {
							if (is_callable(array($item, 'get_product'))) {
								$product = $item->get_product();
							} elseif (is_callable(array($order, 'get_product_from_item'))) {
								$product = $order->get_product_from_item($item);
							} else {
								$product = null;
							}

							if (!$product->is_virtual()) {
								$virtual = false;
								break;
							}
							$virtual = true;
						}
					}
					if ($virtual) {
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
