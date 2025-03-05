<?php
/**
 * ACO setup
 *
 * @package  Autocomplete Woocommerce Orders
 * @since    1.0.0
 */

namespace QuadLayers\ACO;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main ACO Class.
 *
 * @class ACO
 * @version 1.0.0
 */
final class Plugin {

	/**
	 * The single instance of the class.
	 *
	 * @var ACO
	 * @since 1.0
	 */
	protected static $instance;

	/**
	 * Construct
	 */
	private function __construct() {
		/**
		 * Load plugin textdomain.
		 */
		add_action( 'init', array( $this, 'load_textdomain' ) );

		/**
		 * Load plugin files on WooCommerce init
		 */
		add_action(
			'woocommerce_init',
			function () {
				/**
				 * Interfaces.
				 */
				new Backend\Settings();
				new Frontend\Frontend();
				/**
				 * Add premium CSS
				 */
				add_action( 'admin_footer', array( __CLASS__, 'add_premium_css' ) );
				do_action( 'aco_init' );
			}
		);
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'autocomplete-woocommerce-orders', false, ACO_PLUGIN_DIR . '/languages/' );
	}

	/**
	 * Add CSS
	 *
	 * @since 1.0
	 */
	public static function add_premium_css() {
		?>
		<style>
			.aco-premium-field {
				opacity: 0.5;
				pointer-events: none;
			}

			.aco-premium-field .description {
				display: block !important;
			}
		</style>
		<script>
			const fields = document.querySelectorAll('.aco-premium-field')
			Array.from(fields).forEach((field) => {
				field.closest('tr')?.classList.add('aco-premium-field');
			})
		</script>
		<?php
	}

	/**
	 * Main Plugin Instance.
	 *
	 * Ensures only one instance of ACO Plugin is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @see ACO()
	 * @return ACO - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}

function INIT() {
	return Plugin::instance();
}

INIT();
