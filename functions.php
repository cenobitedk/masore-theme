<?php

function masore_theme_enqueue_styles() {
  $theme = wp_get_theme('masore-theme');
  wp_enqueue_style('masore-style', get_stylesheet_directory_uri() . '/assets/main.css', array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'masore_theme_enqueue_styles');
