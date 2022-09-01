<?php

class ACO_Admin_Links {

	protected static $_instance;

	public function __construct() {
		add_filter( 'plugin_action_links_' . plugin_basename( ACO_PLUGIN_FILE ), array( $this, 'add_action_links' ) );
	}

	function add_action_links( $links ) {
		$links[] = '<a target="_blank" href="' . ACO_DOCUMENTATION_URL . '">' . esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ) . '</a>';
		$links[] = '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=silkwave_aco' ) . '">' . esc_html__( 'Settings', 'autocomplete-woocommerce-orders' ) . '</a>';
		return $links;
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}

ACO_Admin_Links::instance();
