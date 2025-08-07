<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	add_action('init', function() {
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
					'url'  => 'https://quadlayers.com/products/autocomplete-woocommerce-orders/?utm_source=aco_plugin&utm_medium=plugin_table&utm_campaign=premium_upgrade&utm_content=premium_link',
					'color' => 'green',
					'target' => '_blank',
				),
				array(
					'place' => 'row_meta',
					'text'  => esc_html__( 'Support', 'autocomplete-woocommerce-orders' ),
					'url'   => 'https://quadlayers.com/account/support/?utm_source=aco_plugin&utm_medium=plugin_table&utm_campaign=support&utm_content=support_link',
				),
				array(
					'place' => 'row_meta',
					'text'  => esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ),
					'url'   => 'https://quadlayers.com/documentation/autocomplete-woocommerce-orders/?utm_source=aco_plugin&utm_medium=plugin_table&utm_campaign=documentation&utm_content=documentation_link',
				),
			)
		);
	});
}
