<?php
/**
 * ACO Header
 *
 * @package  Autocomplete Woocommerce Orders
 */

?>
<div class="wrap about-wrap full-width-layout">

	<h1><?php esc_html_e( 'Suggestions', 'autocomplete-woocommerce-orders' ); ?></h1>

	<p class="about-text"><?php printf( esc_html__( 'Thanks for using our product! We recommend these extensions that will add new features to stand out your business and improve your sales.', 'autocomplete-woocommerce-orders' ), esc_html( ACO_PLUGIN_NAME ) ); ?></p>

	<p class="about-text">
		<?php printf( '<a href="%s" target="_blank">%s</a>', esc_html( ACO_DOCUMENTATION_URL ), esc_html__( 'Documentation', 'autocomplete-woocommerce-orders' ) ); ?></a>
	</p>

	<?php
	printf(
		'<a href="%s" target="_blank"><div style="
               background: #006bff url(%s) no-repeat;
               background-position: top center;
               background-size: 130px 130px;
               color: #fff;
               font-size: 14px;
               text-align: center;
               font-weight: 600;
               margin: 5px 0 0;
               padding-top: 120px;
               height: 40px;
               display: inline-block;
               width: 140px;
               " class="wp-badge">%s</div></a>',
		'https://quadlayers.com/?utm_source=aco_admin',
		esc_url( plugins_url( '/assets/backend/img/quadlayers.jpg', ACO_PLUGIN_FILE ) ),
		esc_html__( 'QuadLayers', 'autocomplete-woocommerce-orders' )
	);
	?>

</div>

<?php
if ( isset( $GLOBALS['submenu'][ ACO_PREFIX ] ) ) {
	if ( is_array( $GLOBALS['submenu'][ ACO_PREFIX ] ) ) {
		?>
		<div class="wrap about-wrap full-width-layout qlwrap">
			<h2 class="nav-tab-wrapper">
				<?php
				foreach ( $GLOBALS['submenu'][ ACO_PREFIX ] as $tab ) {
					if ( strpos( $tab[2], '.php' ) !== false ) {
						continue;
					}
					?>
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=' . esc_attr( $tab[2] ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && $_GET['page'] == $tab[2] ) ? ' nav-tab-active' : ''; ?>"><?php echo esc_html( $tab[0] ); ?></a>
					<?php
				}
				?>
			</h2>
		</div>
		<?php
	}
}
