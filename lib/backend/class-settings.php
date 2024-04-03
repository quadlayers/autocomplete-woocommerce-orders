<?php
/**
 * ACO Settings
 *
 * @package  Autocomplete Woocommerce Orders
 * @since    1.0.0
 */

namespace QuadLayers\ACO\Backend;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Settings Class.
 */
class Settings {


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
		if ( is_admin() ) {
			// add settings tab.
			add_filter(
				'woocommerce_settings_tabs_array',
				array(
					$this,
					'woocommerce_settings_tabs_array',
				),
				50
			);
			// show settings tab.
			add_action(
				'woocommerce_settings_tabs_' . $this->id,
				array(
					$this,
					'show_settings_tab',
				)
			);
			// save settings tab.
			add_action(
				'woocommerce_update_options_' . $this->id,
				array(
					$this,
					'update_settings_tab',
				)
			);
			// add tabs select field.
			add_action(
				'woocommerce_admin_field_' . $this->id,
				array(
					$this,
					'show_' . $this->id . '_field',
				),
				10
			);
			// save tabs select field.
			add_action(
				'woocommerce_update_option_' . $this->id,
				array(
					$this,
					'save_' . $this->id . '_field',
				),
				10
			);
		}

		add_filter(
			'woocommerce_bacs_process_payment_order_status',
			function ( $order_status, $order ) {
				$bacs_order_status = get_option( 'wc_' . $this->id . '_bacs_order_status' );
				if ( $bacs_order_status ) {
					return $bacs_order_status;
				}
				return $order_status;
			},
			10,
			2
		);
		add_filter(
			'woocommerce_cheque_process_payment_order_status',
			function ( $order_status, $order ) {
				$cheque_order_status = get_option( 'wc_' . $this->id . '_cheque_order_status' );
				if ( $cheque_order_status ) {
					return $cheque_order_status;
				}
				return $order_status;
			},
			10,
			2
		);
		add_filter(
			'woocommerce_cod_process_payment_order_status',
			function ( $order_status, $order ) {
				if ( $order->has_downloadable_item() ) {
					$cod_order_status = get_option( 'wc_' . $this->id . '_cod_downloadable_order_status' );
					if ( $cod_order_status ) {
						return $cod_order_status;
					}
					return $order_status;
				}
				$cod_order_status = get_option( 'wc_' . $this->id . '_cod_order_status' );
				if ( $cod_order_status ) {
					return $cod_order_status;
				}
				return $order_status;
			},
			10,
			2
		);

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

							if ( $product && ! $product->is_virtual() ) {
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

	/**
	 * Function woocommerce_settings_tabs_array.
	 *
	 * @param array $settings_tabs Settings array.
	 * @return array
	 */
	public function woocommerce_settings_tabs_array( $settings_tabs ) {
		$settings_tabs[ $this->id ] = esc_html__( 'Autocomplete Orders', 'autocomplete-woocommerce-orders' );

		return $settings_tabs;
	}

	/**
	 * Function show_settings_tab.
	 */
	public function show_settings_tab() {
		$settings = $this->get_settings();

		require_once 'view/page.php';
	}

	/**
	 * Function update_settings_tab.
	 */
	public function update_settings_tab() {
		woocommerce_update_options( $this->get_settings() );
	}

	/**
	 * Function get_settings.
	 */
	public function get_settings() {
		$settings = array(
			'section_title' => array(
				'name' => __( 'Autocomplete Orders', 'autocomplete-woocommerce-orders' ),
				'type' => 'title',
				'desc' => 'Activate the plugin selecting one option from the menu',
				'id'   => 'wc_' . $this->id . '_section_title',
			),
			array(
				'name'     => __( 'Mode', 'autocomplete-woocommerce-orders' ),
				'type'     => 'select',
				'desc'     => __( 'Specify how you want the plugin to work.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => 'virtual_downloadable',
				'id'       => 'wc_' . $this->id . '_mode',
				'css'      => 'height:auto;',
				'options'  => array(
					'off'                  => __( 'Off', 'autocomplete-woocommerce-orders' ),
					'all'                  => __( 'All Orders', 'autocomplete-woocommerce-orders' ),
					'virtual'              => __( 'Virtual Orders', 'autocomplete-woocommerce-orders' ),
					'virtual_downloadable' => __( 'Virtual & Downloadable Orders', 'autocomplete-woocommerce-orders' ),
				),
			),
			array(
				'name'     => __( 'Direct bank transfer', 'autocomplete-woocommerce-orders' ),
				'type'     => 'select',
				'desc'     => __( 'Default order status for Direct bank transfer orders.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => '',
				'id'       => 'wc_' . $this->id . '_bacs_order_status',
				'css'      => 'height:auto;',
				'options'  => $this->get_order_statuses(),
				'class'    => 'aco-premium-field',
			),
			array(
				'name'     => __( 'Check payments', 'autocomplete-woocommerce-orders' ),
				'type'     => 'select',
				'desc'     => __( 'Default order status for Check payments orders.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => '',
				'id'       => 'wc_' . $this->id . '_cheque_order_status',
				'css'      => 'height:auto;',
				'options'  => $this->get_order_statuses(),
				'class'    => 'aco-premium-field',
			),
			array(
				'name'     => __( 'Cash on delivery', 'autocomplete-woocommerce-orders' ),
				'type'     => 'select',
				'desc'     => __( 'Default order status for Cash on delivery orders without downloadable items.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => 'processing',
				'id'       => 'wc_' . $this->id . '_cod_order_status',
				'css'      => 'height:auto;',
				'options'  => $this->get_order_statuses(),
				'class'    => 'aco-premium-field',
			),
			array(
				'name'     => __( 'Cash on delivery (Downloadable)', 'autocomplete-woocommerce-orders' ),
				'type'     => 'select',
				'desc'     => __( 'Default order status for Cash on delivery orders with downloadable items.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => '',
				'id'       => 'wc_' . $this->id . '_cod_downloadable_order_status',
				'css'      => 'height:auto;',
				'options'  => $this->get_order_statuses(),
				'class'    => 'aco-premium-field',
			),
			array(
				'name'     => __( 'Add Payment Method', 'autocomplete-woocommerce-orders' ),
				'type'     => 'checkbox',
				'desc'     => __( 'Add payment method column in the orders table.', 'autocomplete-woocommerce-orders' ),
				'desc_tip' => true,
				'default'  => '',
				'id'       => 'wc_' . $this->id . '_orders_payment_method',
				'class'    => 'aco-premium-field',
			),
			'section_end'   => array(
				'type' => 'sectionend',
				'id'   => 'wc_' . $this->id . '_section_end',
			),
		);

		/**
		 * Add Settings to WooCommerce Settings.
		 *
		 * @since 1.0.0
		 */
		return apply_filters( 'wc_' . $this->id . '_settings', $settings );
	}

	/**
	 * Function get_order_statuses.
	 */
	public function get_order_statuses() {
		$arr            = array();
		$order_statuses = wc_get_order_statuses();

		$arr[''] = __( 'Select an order status', 'autocomplete-woocommerce-orders' );

		foreach ( $order_statuses as $key => $value ) {
			$arr[ str_replace( 'wc-', '', $key ) ] = $value;
		}

		return $arr;
	}
}
