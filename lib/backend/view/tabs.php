<?php
/**
 * ACO Tabs
 *
 * @package  Autocomplete Woocommerce Orders
 */

?>
<ul class="subsubsub">
	<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=silkwave_aco' ) ); ?>"><?php echo esc_html__( 'Settings', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( ACO_PREMIUM_SELL_URL ); ?>"><?php echo esc_html__( 'Premium', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( ACO_SUPPORT_URL ); ?>"><?php echo esc_html__( 'Support', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( ACO_DOCUMENTATION_URL ); ?>"><?php echo esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings_suggestions' ) ); ?>"><?php echo esc_html__( 'Suggestions', 'autocomplete-woocommerce-orders' ); ?></a></li>
	<?php
		/**
		 * Add Action.
		 *
		 * @since 1.0.0
		 */
		do_action( 'aco_sections_header' );
	?>
</ul>
<br class="clear" />
