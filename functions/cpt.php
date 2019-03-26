<?php
/*
===========================
  [[[ Custom Post Types ]]]
===========================
*/

// Clear Rewrite Rules for CPT's
function ex_theme_terlet() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'ex_theme_terlet');

// CPT Quotes
function cpt_quotes() {
	$labels = array(
		'name'                  => _x( 'Quotes', 'Post Type General Name', 'quotes' ),
		'singular_name'         => _x( 'Quote', 'Post Type Singular Name', 'quotes' ),
		'menu_name'             => __( 'Quotes', 'quotes' ),
		'name_admin_bar'        => __( 'Quote', 'quotes' ),
		'archives'              => __( 'Quote Archives', 'quotes' ),
		'attributes'            => __( 'Quote Attributes', 'quotes' ),
		'parent_item_colon'     => __( 'Parent Quote:', 'quotes' ),
		'all_items'             => __( 'All Quotes', 'quotes' ),
		'add_new_item'          => __( 'Add New Quote', 'quotes' ),
		'add_new'               => __( 'Add New', 'quotes' ),
		'new_item'              => __( 'New Quote', 'quotes' ),
		'edit_item'             => __( 'Edit Quote', 'quotes' ),
		'update_item'           => __( 'Update Quote', 'quotes' ),
		'view_item'             => __( 'View Quote', 'quotes' ),
		'view_items'            => __( 'View Quotes', 'quotes' ),
		'search_items'          => __( 'Search Quote', 'quotes' ),
		'not_found'             => __( 'Not found', 'quotes' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'quotes' ),
		'items_list'            => __( 'Quotes list', 'quotes' ),
		'items_list_navigation' => __( 'Quotes list navigation', 'quotes' ),
		'filter_items_list'     => __( 'Filter Quotes list', 'quotes' ),
	);
	$args = array(
		'label'                 => __( 'Quote', 'quotes' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'quote', $args );
}
add_action( 'init', 'cpt_quotes', 0 );


// Custom Enter Title Here Functions
function wpb_change_title_text($title) {
  $screen = get_current_screen();
  if ('quote' == $screen->post_type) {
    $title = 'Enter the name of the person that stated the quote';
  }
  return $title;
}
add_filter('enter_title_here', 'wpb_change_title_text');

// Custom Admin Columns for Quotes
function custom_admin_columns_cpt_quotes($columns) {
  unset($columns['date']);
  $columns['title'] = __('Quote by');
  $columns['quote'] = __('Quote', 'exonym');
  $columns['length'] = __('Quote Length', 'exonym');
  return $columns;
}
function custom_admin_columns_cpt_quotes_content($column, $post_id) {
  if ('quote' === $column) {
    the_field('quote');
  } elseif ('length' === $column) {
    $length = strlen(get_field('quote'));
    if($length > 100) {
      echo '<strong>Warning:</strong> Quote is ' . $length . ' characters long. You may encounter display errors.';
    } else {
      echo $length . ' characters';
    }
  }
}
add_action('manage_quote_posts_custom_column', 'custom_admin_columns_cpt_quotes_content', 10, 2);
add_filter('manage_quote_posts_columns', 'custom_admin_columns_cpt_quotes');
