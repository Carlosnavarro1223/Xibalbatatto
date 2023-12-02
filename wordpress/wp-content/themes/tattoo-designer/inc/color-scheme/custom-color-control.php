<?php

  $tattoo_designer_color_scheme_css = '';

  //---------------------------------Logo-Max-height--------- 
  $tattoo_designer_logo_width = get_theme_mod('tattoo_designer_logo_width');

  if($tattoo_designer_logo_width != false){

    $tattoo_designer_color_scheme_css .='#header .custom-logo-link img.custom-logo{';

      $tattoo_designer_color_scheme_css .='width: '.esc_html($tattoo_designer_logo_width).'px !important;';

    $tattoo_designer_color_scheme_css .='}';
  }
