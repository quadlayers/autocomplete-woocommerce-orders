<?php

/**
 * ACO setup
 *
 * @author   QuadLayers
 * @category ACO
 * @package  Autocomplete Woocommerce Orders
 * @since    1.0.0
 */

namespace QUADLAYERS\ACO;

use QUADLAYERS\ACO\Resources\Backend\Settings;
use QUADLAYERS\ACO\Resources\Frontend\Frontend;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main ACO Class.
 *
 * @class ACO
 * @version 1.0.0
 */
class Plugin
{

	/**
	 * The single instance of the class.
	 *
	 * @var ACO
	 * @since 1.0
	 */
	protected static $instance;

	protected static $menu_slug = 'plugin-init';

	private function __construct()
	{
		new Settings();
		new Frontend();
		add_action('admin_footer', array(__CLASS__, 'add_premium_css'));
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0
	 */
	public function __clone()
	{
		wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'autocomplete-woocommerce-orders'), '1.1');
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0
	 */
	public function __wakeup()
	{
		wc_doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?', 'autocomplete-woocommerce-orders'), '2.1');
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 *
	 * @since 1.0
	 */
	// public function includes()
	// {
	// 	/**
	// 	 * Interfaces.
	// 	 */
	// 	include_once dirname(__FILE__) . '/resources/backend/class-settings.php';
	// 	include_once dirname(__FILE__) . '/resources/frontend/class-frontend.php';
	// }


	/**
	 * Add CSS
	 *
	 * @since 1.0
	 */
	public static function add_premium_css()
	{
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
	public static function instance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}
}

function PluginInit()
{
	return Plugin::instance();
}

PluginInit();
