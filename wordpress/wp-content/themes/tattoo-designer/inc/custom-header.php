<?php
/**
 * @package Tattoo Designer
 * Setup the WordPress core custom header feature.
 *
 * @uses tattoodesigner_header_style()
 */
function tattoodesigner_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'tattoodesigner_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 2500,
		'height'                 => 400,
		'wp-head-callback'       => 'tattoodesigner_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'tattoodesigner_custom_header_setup' );

if ( ! function_exists( 'tattoodesigner_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see tattoodesigner_custom_header_setup().
 */
function tattoodesigner_header_style() {
	$header_text_color = get_header_textcolor();

	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.lowerheader{
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat !important;
			background-position: center top;
			background-size: cover !important;
		}

	<?php endif; ?>	

	#header .text-white h1 a, #header .text-white p a{
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sitetitle_color')); ?> !important;
	}

	#header p.text-white{
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sitetagline_color')); ?> !important;
	}

	header#header p {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_phoneandemailtext_color')); ?>;
	}


	header#header p {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_phoneandemailtext_color')); ?>;
	}

	header#header a.contactus {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_buttonbg_color')); ?>;
	}

	header#header a.contactus {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_buttontext_color')); ?>;
	}

	header#header a.contactus:hover {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_buttontexthover_color')); ?>;
	}

	header#header a.contactus:hover {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_buttonbghover_color')); ?>;
	}

	header#header i.fab,header#header i.fa.fa-envelope,header#header i.fa.fa-phone {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_socialicon_color')); ?>;
	}


	header#header .upperheader {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_headbg_color')); ?>;
	}


	.main-nav ul li a {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_menu_color')); ?>;
	}



	.main-nav a:hover, .current_page_item a {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_menuhrv_color')); ?>;
	}


	.main-nav ul ul.sub-menu a{
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_submenu_color')); ?>;
	}

	.main-nav ul ul {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_submenubg_color')); ?>;
	}

	.main-nav ul ul.sub-menu a:hover {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_submenuhrv_color')); ?>;
	}

	.main-nav ul ul a:hover {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_submenubghrv_color')); ?>;
	}




	#slider h1.title-slider {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_slidertitle_color')); ?> !important;
	}


	#slider .button-slider {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderbuttontext_color')); ?> !important;
	}

	#slider .button-slider {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderbuttonbg_color')); ?> !important;
	}

	#slider a.button-slider.redmor.btn:hover {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderbuttonbghover_color')); ?> !important;
	}

	#slider button.owl-prev {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderprevarrow_color')); ?>;
	}

	#slider button.owl-prev:hover {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderprevarrowhover_color')); ?>;
	}

	#slider button.owl-prev {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderprevarrowbg_color')); ?>;
	}

	#slider button.owl-prev:hover {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_sliderprevarrowbghover_color')); ?>;
	}


	#slider button.owl-next {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_slidernextarrow_color')); ?>;
	}

	#slider button.owl-next:hover {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_slidernextarrowhover_color')); ?>;
	}

	#slider button.owl-next {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_slidernextarrowbg_color')); ?>;
	}

	#slider button.owl-next:hover {
		background: <?php echo esc_attr(get_theme_mod('tattoodesigner_slidernextarrowbghover_color')); ?>;
	}



	
	#service .text-center h2 {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_serviceheading_color')); ?> !important;
	}


	#service .services-box h3 {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_servicetitle_color')); ?> !important;
	}


	#service .services-box i.fa.fa-angle-double-right {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_servicetitlearrow_color')); ?>;
	}


	#blog h4 {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogheading_color')); ?> !important;
	}


	#blog .blog-title {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogtitle_color')); ?> !important;
	}

	#blog .blog-content .blog-description {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogdescription_color')); ?> !important;
	}

	#blog .blog-content a {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogbutton_color')); ?> !important;
	}

	#blog .blog-content a {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogbuttonbg_color')); ?> !important;
	}

	#blog .blog-content i {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogdatecommicon_color')); ?> !important;
	}

	#blog .blog-content p {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_blogdatecomm_color')); ?> !important;
	}




	





	.copywrap a {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footercoypright_color')); ?>;
	}

	.copywrap a:hover {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footercoyprighthrv_color')); ?>;
	}


	#footer h3.widget-title{
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footertitle_color')); ?> !important;

	}

	#footer aside.widget p{
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footerdescription_color')); ?> !important;

	}

	#footer ul li a {
		color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footerlist_color')); ?>;

	}


	#footer {
		background-color: <?php echo esc_attr(get_theme_mod('tattoodesigner_footerbg_color')); ?>;
	}
	

	</style>
	<?php 
}
endif;