<?php

if ( class_exists( 'QuadLayers\\PluginFeedback\\Load' ) ) {
	\QuadLayers\PluginFeedback\Load::instance()->add(
		ACO_PLUGIN_FILE,
		array(
			'support_link' => 'https://wordpress.org/support/plugin/autocomplete-woocommerce-orders/',
		)
	);
}