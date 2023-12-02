<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Tattoo Designer
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
  wp_body_open();
} else {
  do_action( 'wp_body_open' );
} ?>

<div id="preloader">
  <div id="status">&nbsp;</div>
</div>

<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'tattoo-designer' ); ?></a>

<header id="header" class="w-100 left-0">
    <div class="row">
        <div class="header-logo col-lg-4 col-md-4">
          <div class="header-svg1"><svg width="7.472in" height="2.264in">
          <path fill-rule="evenodd"  fill="<?php echo esc_html(get_theme_mod('tattoodesigner_logoborder_color',__('#112b3c','tattoo-designer'))); ?>"
           d="M538.000,0.752 C538.488,43.574 522.657,85.034 492.651,115.635 C455.551,153.470 407.354,163.463 373.736,162.999 C333.082,162.438 310.622,146.029 268.930,130.751 C241.025,120.525 211.825,113.507 181.255,109.588 C121.126,108.581 60.996,107.572 0.867,106.564 C1.874,71.293 2.882,36.022 3.890,0.752 C181.927,0.752 359.963,0.752 538.000,0.752 Z"/>
          </svg></div>
          <div class="header-svg2"><svg width="7.472in" height="2.264in">
          <path fill-rule="evenodd"  fill="rgb(252, 252, 253)"
           d="M538.000,0.753 C538.488,43.574 522.657,85.034 492.651,115.634 C455.551,153.470 407.354,163.463 373.736,162.999 C333.082,162.438 310.622,146.029 268.929,130.750 C241.025,120.526 211.825,113.507 181.255,109.588 C121.125,108.580 60.996,107.572 0.867,106.565 C1.875,71.293 2.882,36.022 3.890,0.753 C181.927,0.753 359.963,0.753 538.000,0.753 Z"/>
          </svg></div>
          <p class="fs-6 fw-normal m-0 text-white">
          <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <?php if ( get_theme_mod('tattoodesigner_tagline_enable',true) != "") { ?>
              <?php echo esc_html( $description ); ?>
              <?php } ?>
            <?php endif; ?>
          </p>
          <div class="text-white">
            <?php tattoodesigner_the_custom_logo(); ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( get_theme_mod('tattoodesigner_title_enable',true) != "") { ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <h1><a class="text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                  <p><a class="text-white" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></p>
                  <?php endif; ?>
                <?php } ?>
              <?php endif; ?>
          </div>
        </div>
        <div class="upperheader col-lg-8 col-md-8 align-self-center">
            <div class="container">
              <?php if ( get_theme_mod('tattoo_designer_topbar', false) != "") { ?>
                <div class="row">
                  <?php if ( get_theme_mod('tattoodesigner_phoneno') != "") { ?>
                    <div class="phoneno col-lg-4 col-md-4 align-self-center">
                      <a class="h-phoneno" href="tel:<?php echo esc_attr(get_theme_mod('tattoodesigner_phoneno')); ?>">
                        <p><i class="fa fa-phone" aria-hidden="true"></i>
                      <?php echo esc_attr(get_theme_mod('tattoodesigner_phoneno','+123 4567 890')); ?></p>
                      </a>
                    </div>
                  <?php }?>

                  <?php if ( get_theme_mod('tattoodesigner_email') != "") { ?>
                    <div class="email col-lg-5 col-md-5 align-self-center">
                        <a class="h-email" href="mailto:<?php echo esc_attr(get_theme_mod('tattoodesigner_email')); ?>">
                          <p><i class="fa fa-envelope" aria-hidden="true"></i>
                          <?php echo esc_attr(get_theme_mod('tattoodesigner_email','info@gmail.com')); ?></p>
                        </a>
                    </div>
                  <?php }?>

                  <div class="social col-lg-3 col-md-3 align-self-center">
                    <?php if ( get_theme_mod('tattoodesigner_fb_link') != "") { ?>
                      <a title="<?php echo esc_attr('facebook', 'tattoo-designer'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('tattoodesigner_fb_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                      </a>
                    <?php } ?>
                     <?php if ( get_theme_mod('tattoodesigner_insta_link') != "") { ?>
                      <a title="<?php echo esc_attr('instagram', 'tattoo-designer'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('tattoodesigner_insta_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
                        <i class="fab fa-instagram" aria-hidden="true"></i>
                      </a>
                    <?php } ?>
                    <?php if ( get_theme_mod('tattoodesigner_twitt_link') != "") { ?>
                      <a title="<?php echo esc_attr('twitter', 'tattoo-designer'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('tattoodesigner_twitt_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                      </a>
                    <?php } ?>
                    <?php if ( get_theme_mod('tattoodesigner_linked_link') != "") { ?>
                      <a title="<?php echo esc_attr('linkedin', 'tattoo-designer'); ?>" target="_blank" href="<?php echo esc_url(get_theme_mod('tattoodesigner_linked_link')); ?>" class="text-decoration-none text-white fs-5 text-white">
                        <i class="fab fa-linkedin" aria-hidden="true"></i>
                      </a>
                    <?php } ?>
                  </div>
                </div>
              <?php }?>
            <div class="lowerheader <?php echo esc_attr(tattoo_designer_sticky_menu()); ?>">
              <div class="row">
                <div class="col-lg-9 col-md-4 col-6 align-self-center">                  
                    <div class="w-auto">
                    <div class="toggle-nav text-center text-md-right py-2 align-self-center">
                      <?php if(has_nav_menu('primary')){ ?>
                        <button role="tab"><?php esc_html_e('MENU','tattoo-designer'); ?></button>
                      <?php }?>
                    </div>
                    <div id="mySidenav" class="nav sidenav text-right align-self-center">
                      <nav id="site-navigation" class="main-nav" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu','tattoo-designer' ); ?>">
                        <?php 
                          wp_nav_menu( array( 
                            'theme_location' => 'primary',
                            'container_class' => 'main-menu clearfix' ,
                            'menu_class' => 'clearfix',
                            'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                            'fallback_cb' => 'wp_page_menu',
                          ) );
                         ?>
                        <a href="javascript:void(0)" class="close-button"><?php esc_html_e('CLOSE','tattoo-designer'); ?></a>
                      </nav>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-8 col-6 align-self-center">
                  <div class="header-btn">
                    <a class="contactus fw-5" href="<?php echo esc_url(get_theme_mod('tattoodesigner_contactus_link')); ?>">
                      <?php echo esc_attr(get_theme_mod('tattoodesigner_contactus_text','Contact Us')); ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
</header>