<?php
/**
 * Upgrade to pro options
 */
function tattoo_designer_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => __( 'About Tattoo Designer', 'tattoo-designer' ),
			'priority' => 1,
		)
	);

	class Tattoo_Designer_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_THEME_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-admin-appearance"></i><?php esc_html_e( 'Theme Page', 'tattoo-designer' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_SUPPORT ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'tattoo-designer' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_REVIEW ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us', 'tattoo-designer' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_PRO_DEMO ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-awards"></i><?php esc_html_e( 'Premium Demo', 'tattoo-designer' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_PREMIUM_PAGE ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade Pro', 'tattoo-designer' ); ?> </a></li>

					<li><a class="upgrade-to-pro" href="<?php echo esc_url( TATTOO_DESIGNER_THEME_DOCUMENTATION ); ?>' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'tattoo-designer' ); ?> </a></li>
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'tattoo_designer_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Tattoo_Designer_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'tattoo_designer_upgrade_pro_options' );
