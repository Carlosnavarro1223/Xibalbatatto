<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tattoo Designer
 */
?>
<div style="background-color: #112b3c;">
<div id="footer">
  <?php 
      $footer_widget_enabled = get_theme_mod('tattoo_designer_footer_widget', false);
      
      if ($footer_widget_enabled !== false && $footer_widget_enabled !== '') { ?>

    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 footer-content footer-1">
            <?php dynamic_sidebar('footer-one'); ?>
          </div>
          <div class="col-lg-3 col-md-3 footer-content footer-2">
            <?php dynamic_sidebar('footer-two'); ?>
          </div>
          <div class="col-lg-3 col-md-3 footer-content footer-3">
            <?php dynamic_sidebar('footer-Three'); ?>
          </div>
          <div class="col-lg-3 col-md-3 footer-content footer-4">
            <?php dynamic_sidebar('footer-Four'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="copywrap text-center">
    <div class="container">
      <p class="mb-0"><a href="<?php echo esc_url(TATTOODESIGNER_FOOTER_LINK); ?>" target="_blank"><?php echo esc_html(get_theme_mod('tattoodesigner_copyright_line',__('Tattoo Designer WordPress Theme','tattoo-designer'))); ?></a> <?php echo esc_html('By Classic Templates','tattoo-designer'); ?></p>
    </div>
  </div>
</div>
</div>

<?php if(get_theme_mod('tattoo_designer_scroll_hide','')){ ?>
   <a id="button"><?php esc_html_e('TOP', 'tattoo-designer'); ?></a>
  <?php } ?>
  
<?php wp_footer(); ?>
</body>
</html>
 