<?php

/**
 * ACO setup
 *
 * @author   QuadLayers
 * @category ACO
 * @package  Autocomplete Woocommerce Orders
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main ACO Class.
 *
 * @class ACO
 * @version 1.0.0
 */
final class ACO {


	/**
	 * The single instance of the class.
	 *
	 * @var ACO
	 * @since 1.0
	 */
	protected static $_instance = null;

	/**
	 * Main ACO Instance.
	 *
	 * Ensures only one instance of ACO is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @see ACO()
	 * @return ACO - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0
	 */
	public function __clone() {
		wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'autocomplete-woocommerce-orders' ), '1.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0
	 */
	public function __wakeup() {
		wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'autocomplete-woocommerce-orders' ), '2.1' );
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {
		/**
		 * Interfaces.
		 */
		include_once dirname( __FILE__ ) . '/backend/class-settings.php';
		include_once dirname( __FILE__ ) . '/frontend/class-frontend.php';
	}

	function i18n() {
		load_plugin_textdomain( 'autocomplete-woocommerce-orders', false, ACO_PLUGIN_DIR . '/languages/' );
	}

	public static function add_premium_css() {
		?>
		<style>
			.aco-premium-field {
				opacity: 0.5; 
				pointer-events: none;
			}
			.aco-premium-field .description {
				display: block!important;
			}
		</style>
		<script>
			const fields = document.querySelectorAll('.aco-premium-field')
			Array.from(fields).forEach((field)=> {
				field.closest('tr')?.classList.add('aco-premium-field');
			})
		</script>
		<?php
	}

	/**
	 * ACO Constructor.
	 */
	public function __construct() {
		$this->i18n();
		$this->includes();
		add_action( 'admin_footer', array( __CLASS__, 'add_premium_css' ) );
	}
}
