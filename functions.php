<?php

function masore_get_collections() {
	$collections = [];
	$taxonomies = get_taxonomies();
	if (in_array('collection', $taxonomies)) {
		$collections = get_terms(array(
			'taxonomy' => 'collection',
			'parent'   => 0,
			'hide_empty' => false,
			'orderby' => 'term_id',
		));
	}
	return $collections;
}

function masore_get_post_collection($id) {
  return wp_get_object_terms($id, 'collection')[0];
}

function masore_theme_enqueue_styles() {
  $theme = wp_get_theme('masore-theme');
  wp_enqueue_style('masore-style', get_stylesheet_directory_uri() . '/assets/main.css', array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'masore_theme_enqueue_styles');

function masore_adjacent_post_link($output, $format, $link, $post, $adjacent) {
  if (empty($output)) {
    $adjacent = $adjacent == 'next' ? 'previous' : 'next';
    return '<span class="inactive">' . str_replace('%link', $adjacent, $format) . '</span>';
  } else {
    return $output;
  }
}

add_filter('previous_post_link', 'masore_adjacent_post_link', 10, 5);
add_filter('next_post_link', 'masore_adjacent_post_link', 10, 5);
