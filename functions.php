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
      'order' => 'DESC'
		));
	}
	return $collections;
}

function masore_get_post_collection($id) {
  return wp_get_object_terms($id, 'collection')[0];
}

function masore_filter_collection_query($query) {
  // Modify query for displaying designs in a collection, sorted by custom field.
  if(is_tax('collection') && !is_admin() && is_main_query()) {
    $query->set('posts_per_page', '50');
    $query->set('orderby', 'meta_value_num');
    $query->set('meta_key', 'number');
    $query->set('order', 'ASC');
  }
}

function masore_theme_enqueue_assets() {
  $theme = wp_get_theme('masore-theme');
  $dir = get_stylesheet_directory_uri();
  wp_enqueue_style('masore-style', $dir . '/assets/main.css', array(), $theme->get('Version'));
  wp_enqueue_script('masore-script', $dir . '/assets/bundle.js', array(), $theme->get('Version'), true);
}

function masore_adjacent_post_link($output, $format, $link, $post, $adjacent) {
  if (empty($output)) {
    return '<span class="inactive">' . str_replace('%link', $adjacent, $format) . '</span>';
  } else {
    return $output;
  }
}

function masore_adjacent_designs() {
  $current = get_the_ID();
  $return = (object)[];
  $args = array(
    'post_type' => 'design',
    'orderby' => 'meta_value_num',
    'meta_key' => 'number',
    'order' => 'ASC',
    'cache_results' => true
  );
  $query = new WP_Query($args);
  foreach ($query->posts as $key => $post) {
    if ($post->ID === $current) {
      if ($query->posts[$key - 1]) {
        $return->prev = new TimberPost($query->posts[$key - 1]->ID);
      }
      if ($query->posts[$key + 1]) {
        $return->next = new TimberPost($query->posts[$key + 1]->ID);
      }
      break;
    }
  }
  return $return;
}

add_action('pre_get_posts', 'masore_filter_collection_query');
add_action('wp_enqueue_scripts', 'masore_theme_enqueue_assets');
add_filter('previous_post_link', 'masore_adjacent_post_link', 10, 5);
add_filter('next_post_link', 'masore_adjacent_post_link', 10, 5);
