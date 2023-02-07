<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	/**
	 *  Promote constants
	 */
	define( 'ACO_PROMOTE_LOGO_SRC', plugins_url( '/assets/backend/img/logo.png', ACO_PLUGIN_FILE ) );
	/**
	 * Notice review
	 */
	define( 'ACO_PROMOTE_REVIEW_URL', 'https://wordpress.org/support/plugin/autocomplete-woocommerce-orders/reviews/?filter=5#new-post' );
	/**
	 * Notice premium sell
	 */
	define( 'ACO_PROMOTE_PREMIUM_SELL_SLUG', 'autocomplete-woocommerce-orders-pro' );
	define( 'ACO_PROMOTE_PREMIUM_SELL_NAME', 'Autocomplete WooCommerce Orders PRO' );
	define( 'ACO_PROMOTE_PREMIUM_SELL_URL', ACO_PREMIUM_SELL_URL );
	/**
	 * Notice cross sell 1
	 */
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_SLUG', 'woocommerce-checkout-manager' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_NAME', 'Checkout Manager' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_DESCRIPTION', esc_html__( 'This plugin allows you to add custom fields to the checkout page, related to billing, shipping or additional fields sections.', 'autocomplete-woocommerce-orders' ) );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_URL', 'https://quadlayers.com/portfolio/woocommerce-checkout-manager/?utm_source=aco_admin' );
	/**
	 * Notice cross sell 2
	 */
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_SLUG', 'woocommerce-direct-checkout' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_NAME', 'WooCommerce Direct Checkout' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_DESCRIPTION', esc_html__( 'It allows you to reduce the steps in the checkout process by skipping the shopping cart page. This can encourage buyers to shop more and quickly. You will increase your sales reducing cart abandonment.', 'autocomplete-woocommerce-orders' ) );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_URL', 'https://quadlayers.com/portfolio/woocommerce-direct-checkout/?utm_source=aco_admin' );

	new \QuadLayers\WP_Notice_Plugin_Promote\Load(
		ACO_PLUGIN_FILE,
		array(
			array(
				'type'               => 'ranking',
				'notice_delay'       => MONTH_IN_SECONDS,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_title'       => sprintf(
					esc_html__(
						'Hello! Thank you for choosing the %s plugin!',
						'autocomplete-woocommerce-orders'
					),
					ACO_PLUGIN_NAME
				),
				'notice_description' => esc_html__( 'Could you please give it a 5-star rating on WordPress?. Your feedback will boost our motivation and help us promote and continue to improve this product.', 'autocomplete-woocommerce-orders' ),
				'notice_link'        => ACO_PROMOTE_REVIEW_URL,
				'notice_link_label'  => esc_html__(
					'Yes, of course!',
					'autocomplete-woocommerce-orders'
				),
				'notice_more_link'   => ACO_SUPPORT_URL,
				'notice_more_label'  => esc_html__(
					'Report a bug',
					'autocomplete-woocommerce-orders'
				),
			),
			array(
				'plugin_slug'        => ACO_PROMOTE_PREMIUM_SELL_SLUG,
				'notice_delay'       => MONTH_IN_SECONDS,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_title'       => esc_html__(
					'Hello! We have a special gift!',
					'autocomplete-woocommerce-orders'
				),
				'notice_description' => sprintf(
					esc_html__(
						'Today we want to make you a special gift. Using the coupon code %1$s before the next 48 hours you can get a 20 percent discount on the premium version of the %2$s plugin.',
						'autocomplete-woocommerce-orders'
					),
					'ADMINPANEL20%',
					ACO_PROMOTE_PREMIUM_SELL_NAME
				),
				'notice_more_link'   => ACO_PROMOTE_PREMIUM_SELL_URL,
				'notice_more_label'  => esc_html__(
					'More info!',
					'autocomplete-woocommerce-orders'
				),
			),
			array(
				'plugin_slug'        => ACO_PROMOTE_CROSS_INSTALL_1_SLUG,
				'notice_delay'       => MONTH_IN_SECONDS * 4,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_title'       => sprintf(
					esc_html__(
						'Hello! We want to invite you to try our %s plugin!',
						'autocomplete-woocommerce-orders'
					),
					ACO_PROMOTE_CROSS_INSTALL_1_NAME
				),
				'notice_description' => ACO_PROMOTE_CROSS_INSTALL_1_DESCRIPTION,
				'notice_more_link'   => ACO_PROMOTE_CROSS_INSTALL_1_URL,
				'notice_more_label'  => esc_html__(
					'More info!',
					'autocomplete-woocommerce-orders'
				),
			),
			array(
				'plugin_slug'        => 'woocommerce-direct-checkout',
				'notice_delay'       => MONTH_IN_SECONDS * 6,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_title'       => sprintf(
					esc_html__(
						'Hello! We want to invite you to try our %s plugin!',
						'autocomplete-woocommerce-orders'
					),
					ACO_PROMOTE_CROSS_INSTALL_2_NAME
				),
				'notice_description' => ACO_PROMOTE_CROSS_INSTALL_2_DESCRIPTION,
				'notice_more_link'   => ACO_PROMOTE_CROSS_INSTALL_2_URL,
				'notice_more_label'  => esc_html__(
					'More info!',
					'autocomplete-woocommerce-orders'
				),
			),
		),
	);
}
