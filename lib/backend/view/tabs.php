<?php
/**
 * ACO Tabs
 *
 * @package  Autocomplete Woocommerce Orders
 */

?>
<ul class="subsubsub">
	<li><a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=silkwave_aco' ) ); ?>"><?php echo esc_html__( 'Settings', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( 'https://quadlayers.com/products/woocommerce-autocomplete-orders/?utm_source=aco_plugin&utm_medium=admin_tab&utm_campaign=premium_upgrade&utm_content=premium_link' ); ?>"><?php echo esc_html__( 'Premium', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( 'https://quadlayers.com/account/support/?utm_source=aco_plugin&utm_medium=admin_tab&utm_campaign=support&utm_content=support_link' ); ?>"><?php echo esc_html__( 'Support', 'autocomplete-woocommerce-orders' ); ?></a></li>
	| <li><a target="_blank" href="<?php echo esc_url( 'https://quadlayers.com/documentation/woocommerce-autocomplete-orders/?utm_source=aco_plugin&utm_medium=admin_tab&utm_campaign=documentation&utm_content=documentation_link' ); ?>"><?php echo esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ); ?></a></li>
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
