<?php
/**
 * Tattoo Designer functions and definitions
 *
 * @package Tattoo Designer
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'tattoodesigner_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function tattoodesigner_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	load_theme_textdomain( 'tattoo-designer', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'tattoo-designer' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // tattoodesigner_setup
add_action( 'after_setup_theme', 'tattoodesigner_setup' );

function tattoo_designer_the_breadcrumb() {
    echo '<div class="breadcrumb my-3">';

    if (!is_home()) {
        echo '<a class="home-main align-self-center" href="' . esc_url(home_url()) . '">';
        bloginfo('name');
        echo "</a>";

        if (is_category() || is_single()) {
            the_category(' , ');
            if (is_single()) {
                echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
            }
        } elseif (is_page()) {
            echo '<span class="current-breadcrumb mx-3">' . esc_html(get_the_title()) . '</span>';
        }
    }

    echo '</div>';
}

function tattoodesigner_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'tattoo-designer' ),
		'description'   => __( 'Appears on blog page sidebar', 'tattoo-designer' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'tattoo-designer' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'tattoo-designer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'tattoo-designer' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'tattoo-designer' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'tattoo-designer' ),
		'description'   => __( 'Appears on shop page', 'tattoo-designer' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer One', 'tattoo-designer' ),
		'description'   => __( 'Appears on footer One', 'tattoo-designer' ),
		'id'            => 'footer-one',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title text-white fw-normal mb-4">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Two', 'tattoo-designer' ),
		'description'   => __( 'Appears on footer Two', 'tattoo-designer' ),
		'id'            => 'footer-two',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title text-white fw-normal mb-4">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Three', 'tattoo-designer' ),
		'description'   => __( 'Appears on footer Three', 'tattoo-designer' ),
		'id'            => 'footer-Three',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title text-white fw-normal mb-4">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Four', 'tattoo-designer' ),
		'description'   => __( 'Appears on footer Four', 'tattoo-designer' ),
		'id'            => 'footer-Four',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title text-white fw-normal mb-4">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tattoodesigner_widgets_init' );

function tattoodesigner_scripts() {

	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'tattoo-designer-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'tattoo-designer-default', esc_url(get_template_directory_uri())."/css/default.css" );

	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'tattoo-designer-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'tattoo-designer-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );
	wp_enqueue_style('tattoo-designer-style', get_stylesheet_uri(), array() );
		wp_style_add_data('tattoo-designer-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'tattoo-designer-basic-style',$tattoo_designer_color_scheme_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// font-family
	$tattoo_designer_headings_font = esc_html(get_theme_mod('tattoo_designer_headings_fonts'));
	$tattoo_designer_body_font = esc_html(get_theme_mod('tattoo_designer_body_fonts'));

	if ($tattoo_designer_headings_font) {
	    wp_enqueue_style('tattoo-designer-headings-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($tattoo_designer_headings_font));
	} else {
	    wp_enqueue_style('poppins-headings', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}

	if ($tattoo_designer_body_font) {
	    wp_enqueue_style('tattoo-designer-body-fonts', 'https://fonts.googleapis.com/css?family=' . urlencode($tattoo_designer_body_font));
	} else {
	    wp_enqueue_style('poppins-body', 'https://fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'tattoodesigner_scripts' );

// Footer Link
define('TATTOODESIGNER_FOOTER_LINK',__('https://www.theclassictemplates.com/themes/free-tattoo-wordpress-theme/','tattoo-designer'));

if ( ! defined( 'TATTOO_DESIGNER_THEME_PAGE' ) ) {
define('TATTOO_DESIGNER_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','tattoo-designer'));
}
if ( ! defined( 'TATTOO_DESIGNER_SUPPORT' ) ) {
define('TATTOO_DESIGNER_SUPPORT',__('https://wordpress.org/support/theme/tattoo-designer','tattoo-designer'));
}
if ( ! defined( 'TATTOO_DESIGNER_REVIEW' ) ) {
define('TATTOO_DESIGNER_REVIEW',__('https://wordpress.org/support/theme/tattoo-designer/reviews/#new-post','tattoo-designer'));
}
if ( ! defined( 'TATTOO_DESIGNER_PRO_DEMO' ) ) {
define('TATTOO_DESIGNER_PRO_DEMO',__('https://www.theclassictemplates.com/trial/tattoo-designer/','tattoo-designer'));
}
if ( ! defined( 'TATTOO_DESIGNER_PREMIUM_PAGE' ) ) {
define('TATTOO_DESIGNER_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/premium-tattoo-designer-wordpress-theme/','tattoo-designer'));
}
if ( ! defined( 'TATTOO_DESIGNER_THEME_DOCUMENTATION' ) ) {
define('TATTOO_DESIGNER_THEME_DOCUMENTATION',__('http://theclassictemplates.com/documentation/tattoo-designer-free/','tattoo-designer'));
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

// select
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';


if ( ! function_exists( 'tattoodesigner_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function tattoodesigner_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
