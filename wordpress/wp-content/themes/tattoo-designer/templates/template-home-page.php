<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tattoo Designer
 */

get_header(); ?>

<div id="content" >
  <?php
    $hidcatslide = get_theme_mod('tattoodesigner_hide_categorysec', false);
    if( $hidcatslide != ''){
  ?>
    <section id="slider">
      <img alt="slider-image" src="http://localhost/classictemplate/wp-content/uploads/2022/10/pexels-antoni-shkraba-7005675.png" class="slider-image-s">
    <div class="owl-carousel owl-theme">
    <?php if( get_theme_mod('tattoodesigner_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('tattoodesigner_slidersection',false)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
      <div class="item">
              <img alt="sliderbg-img" src="<?php the_post_thumbnail_url( 'full' ); ?>" class="sliderbg-img">

        <div class="content d-flex align-items-center position-relative">
          <img alt="slider-image" src="<?php the_post_thumbnail_url( 'full' ); ?>" class="slider-image-s">
          <div class="container position-relative" style="z-index: 1;">
            <div class="slider-content">
              <h1 class="title-slider text-white mb-4">
              <?php the_title(); ?>
              </h1>
              <div class="slider-btn d-flex gap-4">
                <?php if ( get_theme_mod('tattoodesigner_button_text') != "") { ?>
                  <a href="<?php the_permalink(); ?>" class="button-slider redmor btn fw-5 fs-5 px-4 py-2" style="background-color: #ffcb00;color: #112b3c;">
                  <?php echo esc_html(get_theme_mod('tattoodesigner_button_text',__('Read More','tattoo-designer'))); ?>
                </a>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="overlayer"></div>
        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
    </div>
  </section>
  <?php } ?>

  <?php
    $tattoodesigner_hidepageboxes = get_theme_mod('tattoodesigner_disabled_pgboxes', false);
    if( $tattoodesigner_hidepageboxes != ''){
  ?>
    
  <section id="service" class="py-5" style="background-color: #fefefe;">
    <div class="text-center mx-auto d-block">
      <h2 class="mb-3 text-capitalize fw-bold" style="color: #112b3c;font-size: 48px;">
      <?php echo esc_html(get_theme_mod('tattoodesigner_service_heading')); ?>
      </h2>
    </div>
    <div class="pt-3">
      <div class="container">
        <div class="row">
        <?php if( get_theme_mod('tattoodesigner_services_cat',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('tattoodesigner_services_cat',false)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>

          <div class="col-lg-3 col-md-6 colume-row">
            <a href="<?php the_permalink(); ?>">
              <div class="services-box tr-border-radius d-flex" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
                  <div class="content">
                    <h3 class="text-capitalize fw-semibold text-white d-block mb-3"><?php the_title(); ?></h3><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </div>
              </div>
            </a>
          </div>

          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <?php }?>


  <?php
    $tattoodesigner_bloghidepageboxes = get_theme_mod('tattoodesigner_disabled_blogpgboxes', false);
    if( $tattoodesigner_bloghidepageboxes != ''){
  ?>

  <section id="blog" class="py-5" style="background-color: #fefefe;">
    <div class="text-center mx-auto d-block">
      <h4 class="mb-3 text-capitalize fw-bold" style="color: #112b3c;font-size: 48px; ">
      <?php echo esc_html(get_theme_mod('tattoodesigner_blog_heading')); ?>
      </h4>
    </div>

    <div class="pt-3">
      <div class="container">
        <div class="row">

        <?php if( get_theme_mod('tattoodesigner_blog_cat',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('tattoodesigner_blog_cat',false)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
          <div class="col-lg-4 col-md-6 colume-row">
            <div class="blog-box">
              <div class="blog-image">
               <img alt="blog-image" src="<?php the_post_thumbnail_url( 'full' ); ?>" class="blog-image tr-border-radius">
             </div>
              <div class="blog-content bg-white">
                <h5 class="blog-title" style="color: #112b3c; font-size: 22px;">
                <?php the_title(); ?>
                </h5>
                <div class="w-100 d-flex justify-content-between align-items-center mb-3">
                  <div class="date d-flex gap-2 align-items-center">
                    <i class="fas fa-calendar blog-icon fs-5" style="color: #ffcb00;"></i>
                    <p class="mb-0 fw-5" style="color: #112b3c; font-size: 18px;"><?php echo esc_html(get_the_date('M')); echo esc_html(get_the_date(' j')); ?> , <?php  echo esc_html(get_the_date(' Y')); ?></p>
                  </div>
                  <div class="comment d-flex gap-2 align-items-center">
                    <i class="fa fa-comment blog-icon fs-5" style="color: #ffcb00;"></i>
                    <p class="fs-6 mb-0 fw-5" style="color: #112b3c;"><?php echo esc_html(get_comments_number($post->ID)); ?></p>
                  </div>
                </div>
                <?php
                    $trimexcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 20 );
                    echo '<p class="blog-description mb-3 lh-sm" style="color: #767879;">' . esc_html( $shortexcerpt ) . '</p>'; 
                  ?>
                <a href="<?php the_permalink(); ?>" class="text-uppercase text-decoration-none fw-bold" style="color: #ffcb00;"><?php echo esc_html('Read More','tattoo-designer'); ?></a>
              </div>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
          
        </div>
      </div>
    </div>
  </section>
  <?php }?>
</div>

<?php get_footer(); ?>