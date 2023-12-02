<?php
/*
 * @package Tattoo Designer
 */

function tattoo_designer_admin_enqueue_scripts() {
	wp_enqueue_style( 'tattoo-designer-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'tattoo_designer_admin_enqueue_scripts' );

add_action('after_switch_theme', 'tattoo_designer_options');

function tattoo_designer_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=tattoo-designer' ) );
		exit;
	}
}

function tattoo_designer_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'tattoo-designer' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'tattoo-designer' ),'edit_theme_options','tattoo-designer','tattoo_designer_theme_info_page'
	);
}
add_action( 'admin_menu', 'tattoo_designer_theme_info_menu_link' );

function tattoo_designer_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'tattoo-designer' ), esc_html($theme->display( 'Name', 'tattoo-designer'  )),esc_html($theme->display( 'Version', 'tattoo-designer' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'tattoo-designer' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'tattoo-designer' ); ?>:</strong>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'tattoo-designer' ); ?></a>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'tattoo-designer' ); ?></a>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'tattoo-designer' ); ?></a>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'tattoo-designer' ); ?></a>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'tattoo-designer' ); ?></a>
			<a href="<?php echo esc_url( TATTOO_DESIGNER_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'tattoo-designer' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'tattoo-designer' ),
		esc_html($theme->display( 'Name', 'tattoo-designer' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'tattoo-designer' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt=""/>
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'tattoo-designer' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'tattoo-designer' ),esc_html($theme->display( 'Name', 'tattoo-designer' ))); ?></p>
					<p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'tattoo-designer' ); ?></a>
					<a href="<?php echo esc_url( TATTOO_DESIGNER_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'tattoo-designer' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'tattoo-designer' ),
			esc_html($theme->display( 'Name', 'tattoo-designer' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'tattoo-designer' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( TATTOO_DESIGNER_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'tattoo-designer' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'tattoo-designer' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
