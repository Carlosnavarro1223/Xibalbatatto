<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tattoo Designer
 */

get_header(); ?>

<div class="container">
    <div id="content" class="contentsecwrap">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <section class="site-main">
                    <header class="page-header">
                        <h1><?php the_title(); ?></h1>
                        <span><?php tattoo_designer_the_breadcrumb(); ?></span>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/post/content-single', 'single' ); ?>
                        <?php the_post_navigation(); ?>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                        	comments_template();
                        ?>
                    <?php endwhile; // end of the loop. ?>
                </section>
            </div>
            <div class="col-lg-3 col-md-4">
                <?php get_sidebar();?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>