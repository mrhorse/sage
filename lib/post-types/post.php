<?php

/**
 *  Change default 'post' to 'blog'. 
 *  Slug is changed in permalinks options page in CMS admin... BUT NEED TO SET 'rewrite' key to array('with_front'=>false) on ANY custom post types to stop them getting the same slug.
 */

function mrhorse_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog post';
    $submenu['edit.php'][16][0] = 'Blog Tags';
    echo '';
}
function mrhorse_change_post_object() {

    $menu = 'Blog'; // admin menu
    $single = 'Blog post';
    $plural = 'Blog posts';

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $menu;
    $labels->singular_name = $single;
    $labels->add_new = 'Add '. $single;
    $labels->add_new_item = 'Add '. $single;
    $labels->edit_item = 'Edit ' . $single;
    $labels->new_item = 'New ' . $single;
    $labels->all_items = 'All ' . $plural;
    $labels->view_item = 'View '. $single;
    $labels->search_items = 'Search ' . $plural;
    $labels->not_found = 'No ' . $plural . ' found';
    $labels->not_found_in_trash = 'No ' . $plural . ' found in the Trash';
    $labels->menu_name = $plural;
    $labels->name_admin_bar = $plural;

}
 
add_action( 'admin_menu', 'mrhorse_change_post_label' );
add_action( 'init', 'mrhorse_change_post_object' );



/*
// Remove some kind of feature from default posts, if you want
add_action( 'init', 'remove_post_type_feature' );
function remove_post_type_feature() {
    remove_post_type_support( 'post', 'editor' );
}
*/
