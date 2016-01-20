<?php

/** DUPLICATE AND CHANGE BEWFORE USING. THEN ADD VIA FUNCTIONS.PHP **/

// If you want to add tag support add 'taxonomies' => array('post_tag')'

/**
 *  Add new post types
 */
add_action( 'init', function() {

  // Portfolio post type.
  // NB. A custom post slug can not be the same as a page slug that already exists, else pagination stops working.
  // Fix listed below but I haven't fully tested yet!
  $machine_name = 'portfolio';
  $slug = 'portfolio';
  $menu = 'Portfolio'; // admin menu
  $single = 'Portfolio item';
  $plural = 'Portfolio items';

  $labels = array(
    'name'               => _x( $menu, 'post type general name' ),
    'singular_name'      => _x( $single, 'post type singular name' ),
    'add_new'            => _x( 'Add New', $single ),
    'add_new_item'       => __( 'Add New '. $single ),
    'edit_item'          => __( 'Edit ' . $single ),
    'new_item'           => __( 'New ' . $single ),
    'all_items'          => __( 'All ' . $plural ),
    'view_item'          => __( 'View '. $single ),
    'search_items'       => __( 'Search ' . $plural ),
    'not_found'          => __( 'No ' . $plural . ' found' ),
    'not_found_in_trash' => __( 'No ' . $plural . ' found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => $menu
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Individual or global ' . $plural,
    'public' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'show_ui' => true,
    'query_var' => true,
    // IMPORTANT - stops stub being rewritten by global permalinks pattern. Go to permalinks admin page to clear permalink cache
    'rewrite' => array('slug'=>$slug, 'with_front'=>false), 
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'has_archive'   => false,   
    'supports'      => array( 'title' ),
  );
  register_post_type( $machine_name, $args );
  
  
  // the following allows you to have a custom post type AND page sharing the same slug
  add_rewrite_rule($slug . '$', "index.php?pagename=".$slug, "top");
  add_rewrite_rule($slug . '/page/([0-9])*/?', "index.php?pagename=". $slug . '&paged=$matches[1]', "top");

  // flush rewrite rules
  global $wp_rewrite;
  $wp_rewrite->flush_rules(); // !!!
      
});
