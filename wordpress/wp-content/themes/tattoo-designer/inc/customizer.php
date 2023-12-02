<?php
/**
 * Tattoo Designer Theme Customizer
 *
 * @package Tattoo Designer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tattoodesigner_customize_register( $wp_customize ) {

	function tattoodesigner_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	wp_enqueue_style('tattoo-designer-customize-controls', trailingslashit(esc_url(get_template_directory_uri())).'/css/customize-controls.css');

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//Logo
    $wp_customize->add_setting('tattoo_designer_logo_width',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'tattoo_designer_sanitize_integer'
	));
	$wp_customize->add_control(new Tattoo_Designer_Slider_Custom_Control( $wp_customize, 'tattoo_designer_logo_width',array(
		'label'	=> esc_html__('Logo Width','tattoo-designer'),
		'section'=> 'title_tagline',
		'settings'=>'tattoo_designer_logo_width',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	
	// color site title
	$wp_customize->add_setting('tattoodesigner_sitetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sitetitle_color', array(
	   'settings' => 'tattoodesigner_sitetitle_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Title Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('tattoodesigner_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'tattoodesigner_sanitize_checkbox',
	));
	$wp_customize->add_control( 'tattoodesigner_title_enable', array(
	   'settings' => 'tattoodesigner_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','tattoo-designer'),
	   'type'      => 'checkbox'
	));


	// color site tagline
	$wp_customize->add_setting('tattoodesigner_sitetagline_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sitetagline_color', array(
	   'settings' => 'tattoodesigner_sitetagline_color',
	   'section'   => 'title_tagline',
	   'label' => __('Site Tagline Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	$wp_customize->add_setting('tattoodesigner_tagline_enable',array(
		'default' => true,
		'sanitize_callback' => 'tattoodesigner_sanitize_checkbox',
	));
	$wp_customize->add_control( 'tattoodesigner_tagline_enable', array(
	   'settings' => 'tattoodesigner_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','tattoo-designer'),
	   'type'      => 'checkbox'
	));

	// woocommerce section
	$wp_customize->add_section('tattoo_designer_woocommerce_page_settings', array(
		'title'    => __('WooCommerce Page Settings', 'tattoo-designer'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    // shop page sidebar alignment
    $wp_customize->add_setting('tattoo_designer_shop_page_sidebar_position', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'tattoo_designer_sanitize_choices',
	));
	$wp_customize->add_control('tattoo_designer_shop_page_sidebar_position',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Sidebar', 'tattoo-designer'),
		'section'        => 'tattoo_designer_woocommerce_page_settings',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'tattoo-designer'),
			'Right Sidebar' => __('Right Sidebar', 'tattoo-designer'),
		),
	));

	//Theme Options
	$wp_customize->add_panel( 'tattoodesigner_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'tattoo-designer' ),
	) );

	// Header Section
	$wp_customize->add_section('tattoodesigner_header_section', array(
        'title' => __('Manage Header Section', 'tattoo-designer'),
		'description' => __('<p class="sec-title">Manage Header Section</p>','tattoo-designer'),
        'priority' => null,
		'panel' => 'tattoodesigner_panel_area',
 	));

 	$wp_customize->add_setting('tattoo_designer_topbar',array(
		'default' => false,
		'sanitize_callback' => 'tattoo_designer_sanitize_checkbox',
	));

	$wp_customize->add_control( 'tattoo_designer_topbar', array(
	   'section'   => 'tattoodesigner_header_section',
	   'label'	=> __('Check To Show Topbar','tattoo-designer'),
	   'type'      => 'checkbox'
 	));

 	$wp_customize->add_setting('tattoo_designer_stickyheader',array(
		'default' => false,
		'sanitize_callback' => 'tattoo_designer_sanitize_checkbox',
	));

	$wp_customize->add_control( 'tattoo_designer_stickyheader', array(
	   'section'   => 'tattoodesigner_header_section',
	   'label'	=> __('Check To Show Sticky Header','tattoo-designer'),
	   'type'      => 'checkbox'
 	));

 	// header headbg
	$wp_customize->add_setting('tattoodesigner_logoborder_color',array(
		'default' => '#112b3c',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_logoborder_color', array(
	   'settings' => 'tattoodesigner_logoborder_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Logo Border Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

 	// header headbg
	$wp_customize->add_setting('tattoodesigner_headbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_headbg_color', array(
	   'settings' => 'tattoodesigner_headbg_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Header BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('tattoodesigner_phoneno',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_phoneno', array(
	   'settings' => 'tattoodesigner_phoneno',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('PhoneNo Text', 'tattoo-designer'),
	   'type'      => 'text'
	));


	$wp_customize->add_setting('tattoodesigner_email',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_email', array(
	   'settings' => 'tattoodesigner_email',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Email Text', 'tattoo-designer'),
	   'type'      => 'text'
	));


	// phoneno & email text color
	$wp_customize->add_setting('tattoodesigner_phoneandemailtext_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_phoneandemailtext_color', array(
	   'settings' => 'tattoodesigner_phoneandemailtext_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('PhoneNo & Email Text Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


 	$wp_customize->add_setting('tattoodesigner_contactus_text',array(
		'default' => 'Contact Us',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_contactus_text', array(
	   'settings' => 'tattoodesigner_contactus_text',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Add ContactUs Button', 'tattoo-designer'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('tattoodesigner_contactus_link',array(
		'default' => '#',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_contactus_link', array(
	   'settings' => 'tattoodesigner_contactus_link',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('ContactUs Button Link', 'tattoo-designer'),
	   'type'      => 'url'
	));

	// button text color
	$wp_customize->add_setting('tattoodesigner_buttontext_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_buttontext_color', array(
	   'settings' => 'tattoodesigner_buttontext_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Button Text Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// button bg color
	$wp_customize->add_setting('tattoodesigner_buttonbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_buttonbg_color', array(
	   'settings' => 'tattoodesigner_buttonbg_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Button BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// button texthover color
	$wp_customize->add_setting('tattoodesigner_buttontexthover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_buttontexthover_color', array(
	   'settings' => 'tattoodesigner_buttontexthover_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Button Text Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// button bghover color
	$wp_customize->add_setting('tattoodesigner_buttonbghover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_buttonbghover_color', array(
	   'settings' => 'tattoodesigner_buttonbghover_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Button BG Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('tattoodesigner_fb_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_fb_link', array(
	   'settings' => 'tattoodesigner_fb_link',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Facebook Link', 'tattoo-designer'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('tattoodesigner_insta_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_insta_link', array(
	   'settings' => 'tattoodesigner_insta_link',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Instagram Link', 'tattoo-designer'),
	   'type'      => 'url'
	));


	$wp_customize->add_setting('tattoodesigner_twitt_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_twitt_link', array(
	   'settings' => 'tattoodesigner_twitt_link',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Twitter Link', 'tattoo-designer'),
	   'type'      => 'url'
	));


	$wp_customize->add_setting('tattoodesigner_linked_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_linked_link', array(
	   'settings' => 'tattoodesigner_linked_link',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Linkdin Link', 'tattoo-designer'),
	   'type'      => 'url'
	));

	// header socialicon
	$wp_customize->add_setting('tattoodesigner_socialicon_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_socialicon_color', array(
	   'settings' => 'tattoodesigner_socialicon_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Social Icon Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	// header menu
	$wp_customize->add_setting('tattoodesigner_menu_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_menu_color', array(
	   'settings' => 'tattoodesigner_menu_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Menu Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	// header menu hover color
	$wp_customize->add_setting('tattoodesigner_menuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_menuhrv_color', array(
	   'settings' => 'tattoodesigner_menuhrv_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('Menu Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// header sub menu color
	$wp_customize->add_setting('tattoodesigner_submenu_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_submenu_color', array(
	   'settings' => 'tattoodesigner_submenu_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('SubMenu Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// header sub menu bg color
	$wp_customize->add_setting('tattoodesigner_submenubg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_submenubg_color', array(
	   'settings' => 'tattoodesigner_submenubg_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('SubMenu BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// header sub menu hover color
	$wp_customize->add_setting('tattoodesigner_submenuhrv_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_submenuhrv_color', array(
	   'settings' => 'tattoodesigner_submenuhrv_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('SubMenu Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// header sub menu bg hover color
	$wp_customize->add_setting('tattoodesigner_submenubghrv_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_submenubghrv_color', array(
	   'settings' => 'tattoodesigner_submenubghrv_color',
	   'section'   => 'tattoodesigner_header_section',
	   'label' => __('SubMenu BG Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// Google Fonts
    $wp_customize->add_section( 'tattoo_designer_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'tattoo-designer' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'tattoo_designer_headings_fonts', array(
		'sanitize_callback' => 'tattoo_designer_sanitize_fonts',
	));
	$wp_customize->add_control( 'tattoo_designer_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'tattoo-designer'),
		'section' => 'tattoo_designer_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'tattoo_designer_body_fonts', array(
		'sanitize_callback' => 'tattoo_designer_sanitize_fonts'
	));
	$wp_customize->add_control( 'tattoo_designer_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'tattoo-designer' ),
		'section' => 'tattoo_designer_google_fonts_section',
		'choices' => $font_choices
	));


	// Home Category Dropdown Section
	$wp_customize->add_section('tattoodesigner_one_cols_section',array(
		'title'	=> __('Manage Slider Section','tattoo-designer'),
		'description'	=> __('<p class="sec-title">Manage Slider Section</p> Select Category from the Dropdowns for slider, Also use the given image dimension (1600 x 850).','tattoo-designer'),
		'priority'	=> null,
		'panel' => 'tattoodesigner_panel_area'
	));

	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'tattoodesigner_slidersection', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Tattoodesigner_Category_Dropdown_Custom_Control( $wp_customize, 'tattoodesigner_slidersection', array(
		'section' => 'tattoodesigner_one_cols_section',
		'settings'   => 'tattoodesigner_slidersection',
	) ) );

	//Hide Section
	$wp_customize->add_setting('tattoodesigner_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'tattoodesigner_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_hide_categorysec', array(
	   'settings' => 'tattoodesigner_hide_categorysec',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label'     => __('Check To Enable This Section','tattoo-designer'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('tattoodesigner_button_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_button_text', array(
	   'settings' => 'tattoodesigner_button_text',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Add Button Text', 'tattoo-designer'),
	   'type'      => 'text'
	));




	// color slider title
	$wp_customize->add_setting('tattoodesigner_slidertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_slidertitle_color', array(
	   'settings' => 'tattoodesigner_slidertitle_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Title Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	// color slider button text
	$wp_customize->add_setting('tattoodesigner_sliderbuttontext_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderbuttontext_color', array(
	   'settings' => 'tattoodesigner_sliderbuttontext_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Button Text Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// color slider button bg
	$wp_customize->add_setting('tattoodesigner_sliderbuttonbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderbuttonbg_color', array(
	   'settings' => 'tattoodesigner_sliderbuttonbg_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Button BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// color slider button bghover
	$wp_customize->add_setting('tattoodesigner_sliderbuttonbghover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderbuttonbghover_color', array(
	   'settings' => 'tattoodesigner_sliderbuttonbghover_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Button BG Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider prevarrow color
	$wp_customize->add_setting('tattoodesigner_sliderprevarrow_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderprevarrow_color', array(
	   'settings' => 'tattoodesigner_sliderprevarrow_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Prev Arrows Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider prevarrowhover color
	$wp_customize->add_setting('tattoodesigner_sliderprevarrowhover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderprevarrowhover_color', array(
	   'settings' => 'tattoodesigner_sliderprevarrowhover_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Prev Arrows hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider prevarrowbg color
	$wp_customize->add_setting('tattoodesigner_sliderprevarrowbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderprevarrowbg_color', array(
	   'settings' => 'tattoodesigner_sliderprevarrowbg_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Prev Arrows BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider prevarrowbghover color
	$wp_customize->add_setting('tattoodesigner_sliderprevarrowbghover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_sliderprevarrowbghover_color', array(
	   'settings' => 'tattoodesigner_sliderprevarrowbghover_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Prev Arrows BG Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider nextarrow color
	$wp_customize->add_setting('tattoodesigner_slidernextarrow_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_slidernextarrow_color', array(
	   'settings' => 'tattoodesigner_slidernextarrow_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Next Arrows Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider nextarrowhover color
	$wp_customize->add_setting('tattoodesigner_slidernextarrowhover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_slidernextarrowhover_color', array(
	   'settings' => 'tattoodesigner_slidernextarrowhover_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Next Arrows hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider nextarrowbg color
	$wp_customize->add_setting('tattoodesigner_slidernextarrowbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_slidernextarrowbg_color', array(
	   'settings' => 'tattoodesigner_slidernextarrowbg_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Next Arrows BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// slider nextarrowbghover color
	$wp_customize->add_setting('tattoodesigner_slidernextarrowbghover_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_slidernextarrowbghover_color', array(
	   'settings' => 'tattoodesigner_slidernextarrowbghover_color',
	   'section'   => 'tattoodesigner_one_cols_section',
	   'label' => __('Next Arrows BG Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));




	// Services Section
	$wp_customize->add_section('tattoodesigner_below_slider_section', array(
		'title'	=> __('Manage Services Section','tattoo-designer'),
		'description'	=> __('<p class="sec-title">Manage Services Section</p> Select Pages from the dropdown for Services.','tattoo-designer'),
		'priority'	=> null,
		'panel' => 'tattoodesigner_panel_area',
	));


	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'tattoodesigner_services_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Tattoodesigner_Category_Dropdown_Custom_Control( $wp_customize, 'tattoodesigner_services_cat', array(
		'section' => 'tattoodesigner_below_slider_section',
		'settings'   => 'tattoodesigner_services_cat',
	) ) );

	$wp_customize->add_setting('tattoodesigner_disabled_pgboxes',array(
		'default' => false,
		'sanitize_callback' => 'tattoodesigner_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_disabled_pgboxes', array(
	   'settings' => 'tattoodesigner_disabled_pgboxes',
	   'section'   => 'tattoodesigner_below_slider_section',
	   'label'     => __('Check To Enable This Section','tattoo-designer'),
	   'type'      => 'checkbox'
	));


	$wp_customize->add_setting('tattoodesigner_service_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_service_heading', array(
	   'settings' => 'tattoodesigner_service_heading',
	   'section'   => 'tattoodesigner_below_slider_section',
	   'label' => __('Heading', 'tattoo-designer'),
	   'type'      => 'text'
	));

	//  service heading color
	$wp_customize->add_setting('tattoodesigner_serviceheading_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_serviceheading_color', array(
	   'settings' => 'tattoodesigner_serviceheading_color',
	   'section'   => 'tattoodesigner_below_slider_section',
	   'label' => __('Heading Color', 'tattoo-designer'),
	   'type'      => 'color'
	));



	//  service title color
	$wp_customize->add_setting('tattoodesigner_servicetitle_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_servicetitle_color', array(
	   'settings' => 'tattoodesigner_servicetitle_color',
	   'section'   => 'tattoodesigner_below_slider_section',
	   'label' => __('Title Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//  service titlearrow color
	$wp_customize->add_setting('tattoodesigner_servicetitlearrow_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_servicetitlearrow_color', array(
	   'settings' => 'tattoodesigner_servicetitlearrow_color',
	   'section'   => 'tattoodesigner_below_slider_section',
	   'label' => __('Title Arrow Color', 'tattoo-designer'),
	   'type'      => 'color'
	));



	// blog Section
	$wp_customize->add_section('tattoodesigner_below_blog_section', array(
		'title'	=> __('Manage Blog Section','tattoo-designer'),
		'description'	=> __('<p class="sec-title">Manage Blog Section</p> Select Pages from the dropdown for blog.','tattoo-designer'),
		'priority'	=> null,
		'panel' => 'tattoodesigner_panel_area',
	));


	// Add a category dropdown Slider Coloumn
	$wp_customize->add_setting( 'tattoodesigner_blog_cat', array(
		'default'	=> '0',
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Tattoodesigner_Category_Dropdown_Custom_Control( $wp_customize, 'tattoodesigner_blog_cat', array(
		'section' => 'tattoodesigner_below_blog_section',
		'settings'   => 'tattoodesigner_blog_cat',
	) ) );

	$wp_customize->add_setting('tattoodesigner_disabled_blogpgboxes',array(
		'default' => false,
		'sanitize_callback' => 'tattoodesigner_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_disabled_blogpgboxes', array(
	   'settings' => 'tattoodesigner_disabled_blogpgboxes',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label'     => __('Check To Enable This Section','tattoo-designer'),
	   'type'      => 'checkbox'
	));


	$wp_customize->add_setting('tattoodesigner_blog_heading',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'tattoodesigner_blog_heading', array(
	   'settings' => 'tattoodesigner_blog_heading',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Heading', 'tattoo-designer'),
	   'type'      => 'text'
	));

	//  blog heading color
	$wp_customize->add_setting('tattoodesigner_blogheading_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogheading_color', array(
	   'settings' => 'tattoodesigner_blogheading_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Heading Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	//  blog title color
	$wp_customize->add_setting('tattoodesigner_blogtitle_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogtitle_color', array(
	   'settings' => 'tattoodesigner_blogtitle_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Title Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//  blog description color
	$wp_customize->add_setting('tattoodesigner_blogdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogdescription_color', array(
	   'settings' => 'tattoodesigner_blogdescription_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Description Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// blog button color
	$wp_customize->add_setting('tattoodesigner_blogbutton_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogbutton_color', array(
	   'settings' => 'tattoodesigner_blogbutton_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Button Text Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// blog buttonbg color
	$wp_customize->add_setting('tattoodesigner_blogbuttonbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogbuttonbg_color', array(
	   'settings' => 'tattoodesigner_blogbuttonbg_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Button BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// blog datecomm color
	$wp_customize->add_setting('tattoodesigner_blogdatecomm_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control('tattoodesigner_blogdatecomm_color', array(
	   'settings' => 'tattoodesigner_blogdatecomm_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Date & comment Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	// blog datecommicon color
	$wp_customize->add_setting('tattoodesigner_blogdatecommicon_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_blogdatecommicon_color', array(
	   'settings' => 'tattoodesigner_blogdatecommicon_color',
	   'section'   => 'tattoodesigner_below_blog_section',
	   'label' => __('Date Icon Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//Blog post
	$wp_customize->add_section('tattoo_designer_blog_post_settings',array(
        'title' => __('Manage Post Section', 'tattoo-designer'),
        'priority' => null,
        'panel' => 'tattoodesigner_panel_area'
    ) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('tattoo_designer_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'tattoo_designer_sanitize_choices'
	));
	$wp_customize->add_control('tattoo_designer_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Post Sidebar Position', 'tattoo-designer'),
     'description'   => __('This option work for blog page, archive page and search page.', 'tattoo-designer'),
     'section' => 'tattoo_designer_blog_post_settings',
     'choices' => array(
         'full' => __('Full','tattoo-designer'),
         'left' => __('Left','tattoo-designer'),
         'right' => __('Right','tattoo-designer'),
         'three-column' => __('Three Columns','tattoo-designer'),
         'four-column' => __('Four Columns','tattoo-designer'),
         'grid' => __('Grid Layout','tattoo-designer')
     ),
	) );

	$wp_customize->add_setting('tattoo_designer_blog_post_description_option',array(
    	'default'   => 'Full Content', 
        'sanitize_callback' => 'tattoo_designer_sanitize_choices'
	));
	$wp_customize->add_control('tattoo_designer_blog_post_description_option',array(
        'type' => 'radio',
        'label' => __('Post Description Length','tattoo-designer'),
        'section' => 'tattoo_designer_blog_post_settings',
        'choices' => array(
            'No Content' => __('No Content','tattoo-designer'),
            'Excerpt Content' => __('Excerpt Content','tattoo-designer'),
            'Full Content' => __('Full Content','tattoo-designer'),
        ),
	) );

	// Footer Section
	$wp_customize->add_section('tattoodesigner_footer', array(
		'title'	=> __('Manage Footer Section','tattoo-designer'),
		'description'	=> __('<p class="sec-title">Manage Footer Section</p>','tattoo-designer'),
		'priority'	=> null,
		'panel' => 'tattoodesigner_panel_area',
	));

	$wp_customize->add_setting('tattoo_designer_footer_widget', array(
	    'default' => false,
	    'sanitize_callback' => 'tattoo_designer_sanitize_checkbox',
	));
	$wp_customize->add_control('tattoo_designer_footer_widget', array(
	    'settings' => 'tattoo_designer_footer_widget', // Corrected setting name
	    'section'   => 'tattoodesigner_footer',
	    'label'     => __('Check to Enable Footer Widget', 'tattoo-designer'),
	    'type'      => 'checkbox',
	));

	$wp_customize->add_setting('tattoodesigner_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'tattoodesigner_copyright_line', array(
	   'section' 	=> 'tattoodesigner_footer',
	   'label'	 	=> __('Copyright Line','tattoo-designer'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));


	//  footer coypright color
	$wp_customize->add_setting('tattoodesigner_footercoypright_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footercoypright_color', array(
	   'settings' => 'tattoodesigner_footercoypright_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('Coypright Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//  footer coyprighthrv color
	$wp_customize->add_setting('tattoodesigner_footercoyprighthrv_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footercoyprighthrv_color', array(
	   'settings' => 'tattoodesigner_footercoyprighthrv_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('Coypright Hover Color', 'tattoo-designer'),
	   'type'      => 'color'
	));



	//  footer bg color
	$wp_customize->add_setting('tattoodesigner_footerbg_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footerbg_color', array(
	   'settings' => 'tattoodesigner_footerbg_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('BG Color', 'tattoo-designer'),
	   'type'      => 'color'
	));


	//  footer title color
	$wp_customize->add_setting('tattoodesigner_footertitle_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footertitle_color', array(
	   'settings' => 'tattoodesigner_footertitle_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('Title Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//  footer description color
	$wp_customize->add_setting('tattoodesigner_footerdescription_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footerdescription_color', array(
	   'settings' => 'tattoodesigner_footerdescription_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('Description Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	//  footer list color
	$wp_customize->add_setting('tattoodesigner_footerlist_color',array(
		'default' => '',
		'sanitize_callback' => 'tattoodesigner_sanitize_hex_color',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'tattoodesigner_footerlist_color', array(
	   'settings' => 'tattoodesigner_footerlist_color',
	   'section'   => 'tattoodesigner_footer',
	   'label' => __('List Color', 'tattoo-designer'),
	   'type'      => 'color'
	));

	$wp_customize->add_setting('tattoo_designer_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'tattoo_designer_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'tattoo_designer_scroll_hide',array(
        'label'          => __( 'Check To Show Scroll To Top', 'tattoo-designer' ),
        'section'        => 'tattoodesigner_footer',
        'settings'       => 'tattoo_designer_scroll_hide',
        'type'           => 'checkbox',
    )));


}
add_action( 'customize_register', 'tattoodesigner_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tattoodesigner_customize_preview_js() {
	wp_enqueue_script( 'tattoodesigner_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'tattoodesigner_customize_preview_js' );
