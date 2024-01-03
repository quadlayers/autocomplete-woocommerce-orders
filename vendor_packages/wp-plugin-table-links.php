<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	new \QuadLayers\WP_Plugin_Table_Links\Load(
		ACO_PLUGIN_FILE,
		array(
			array(
				'text' => esc_html__( 'Settings', 'autocomplete-woocommerce-orders' ),
				'url'  => admin_url( 'admin.php?page=wc-settings&tab=silkwave_aco' ),
				'target' => '_self',
			),
			array(
				'text' => esc_html__( 'Premium', 'autocomplete-woocommerce-orders' ),
				'url'  => ACO_PREMIUM_SELL_URL,
			),
			array(
				'place' => 'row_meta',
				'text'  => esc_html__( 'Support', 'autocomplete-woocommerce-orders' ),
				'url'   => ACO_SUPPORT_URL,
			),
			array(
				'place' => 'row_meta',
				'text'  => esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ),
				'url'   => ACO_DOCUMENTATION_URL,
			),
		)
	);
}
