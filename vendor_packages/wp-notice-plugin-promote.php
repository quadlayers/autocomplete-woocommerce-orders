<?php

if ( class_exists( 'QuadLayers\\WP_Notice_Plugin_Promote\\Load' ) ) {
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
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_NAME', 'WooCommerce Checkout Manager' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_DESCRIPTION', esc_html__( 'This plugin allows you to add custom fields to the checkout page, related to billing, shipping or additional fields sections.', 'autocomplete-woocommerce-orders' ) );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_URL', 'https://quadlayers.com/products/woocommerce-checkout-manager/?utm_source=aco_admin' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_1_LOGO_SRC', plugins_url( '/assets/backend/img/woocommerce-checkout-manager.jpg', ACO_PLUGIN_FILE ) );
	/**
	 * Notice cross sell 2
	 */
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_SLUG', 'woocommerce-direct-checkout' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_NAME', 'WooCommerce Direct Checkout' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_DESCRIPTION', esc_html__( 'It allows you to reduce the steps in the checkout process by skipping the shopping cart page. This can encourage buyers to shop more and quickly. You will increase your sales reducing cart abandonment.', 'autocomplete-woocommerce-orders' ) );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_URL', 'https://quadlayers.com/products/woocommerce-direct-checkout/?utm_source=aco_admin' );
	define( 'ACO_PROMOTE_CROSS_INSTALL_2_LOGO_SRC', plugins_url( '/assets/backend/img/woocommerce-direct-checkout.jpg', ACO_PLUGIN_FILE ) );

	new \QuadLayers\WP_Notice_Plugin_Promote\Load(
		ACO_PLUGIN_FILE,
		array(
			array(
				'type'               => 'ranking',
				'notice_delay'       => 0,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_description' => sprintf(
								esc_html__( 'Hello! %2$s We\'ve spent countless hours developing this free plugin for you and would really appreciate it if you could drop us a quick rating. Your feedback is extremely valuable to us. %3$s It helps us to get better. Thanks for using %1$s.', 'perfect-woocommerce-brands' ),
								'<b>'.ACO_PLUGIN_NAME.'</b>',
								'<span style="font-size: 16px;">🙂</span>',
								'<br>'
				),
				'notice_link'        => ACO_PROMOTE_REVIEW_URL,
				'notice_more_link'   => ACO_SUPPORT_URL,
				'notice_more_label'  => esc_html__(
					'Report a bug',
					'perfect-woocommerce-brands'
				),
			),
			array(
				'plugin_slug'        => ACO_PROMOTE_PREMIUM_SELL_SLUG,
				'plugin_install_link'   => ACO_PROMOTE_PREMIUM_SELL_URL,
				'plugin_install_label'  => esc_html__(
					'Purchase Now',
					'perfect-woocommerce-brands'
				),
				'notice_delay'       => WEEK_IN_SECONDS,
				'notice_logo'        => ACO_PROMOTE_LOGO_SRC,
				'notice_title'       => esc_html__(
					'Hello! We have a special gift!',
					'perfect-woocommerce-brands'
				),
				'notice_description' => sprintf(
					esc_html__(
						'Today we have a special gift for you. Use the coupon code %1$s within the next 48 hours to receive a %2$s discount on the premium version of the %3$s plugin.',
						'perfect-woocommerce-brands'
					),
					'ADMINPANEL20%',
					'20%',
					ACO_PROMOTE_PREMIUM_SELL_NAME
				),
				'notice_more_link'   => ACO_PROMOTE_PREMIUM_SELL_URL,
			),
			array(
				'plugin_slug'        => ACO_PROMOTE_CROSS_INSTALL_1_SLUG,
				'notice_delay'       => MONTH_IN_SECONDS * 3,
				'notice_logo'        => ACO_PROMOTE_CROSS_INSTALL_1_LOGO_SRC,
				'notice_title'       => sprintf(
					esc_html__(
						'Hello! We want to invite you to try our %s plugin!',
						'perfect-woocommerce-brands'
					),
					ACO_PROMOTE_CROSS_INSTALL_1_NAME
				),
				'notice_description' => ACO_PROMOTE_CROSS_INSTALL_1_DESCRIPTION,
				'notice_more_link'   => ACO_PROMOTE_CROSS_INSTALL_1_URL
			),
			array(
				'plugin_slug'        => ACO_PROMOTE_CROSS_INSTALL_2_SLUG,
				'notice_delay'       => MONTH_IN_SECONDS * 6,
				'notice_logo'        => ACO_PROMOTE_CROSS_INSTALL_2_LOGO_SRC,
				'notice_title'       => sprintf(
					esc_html__(
						'Hello! We want to invite you to try our %s plugin!',
						'perfect-woocommerce-brands'
					),
					ACO_PROMOTE_CROSS_INSTALL_2_NAME
				),
				'notice_description' => ACO_PROMOTE_CROSS_INSTALL_2_DESCRIPTION,
				'notice_more_link'   => ACO_PROMOTE_CROSS_INSTALL_2_URL
			),
		)
	);
}
