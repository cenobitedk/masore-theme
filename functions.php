<?php

function masore_theme_enqueue_styles() {
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/assets/style.css', [], wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', 'masore_theme_enqueue_styles');
