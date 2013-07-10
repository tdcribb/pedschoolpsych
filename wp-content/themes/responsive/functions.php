<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 *
 * WARNING: Please do not edit this file in any way
 *
 * load the theme function files
 */
require ( get_template_directory() . '/core/includes/functions.php' );
require ( get_template_directory() . '/core/includes/theme-options.php' );
require ( get_template_directory() . '/core/includes/post-custom-meta.php' );
require ( get_template_directory() . '/core/includes/tha-theme-hooks.php' );
require ( get_template_directory() . '/core/includes/hooks.php' );
require ( get_template_directory() . '/core/includes/version.php' );

add_filter('the_content', 'filter_ptags_on_images');

add_filter( 'show_admin_bar', '__return_false' );

add_filter('the_content', 'remove_img_titles');

function remove_img_titles($text) {

    // Get all title="..." tags from the html.
    $result = array();
    preg_match_all('|title="[^"]*"|U', $text, $result);

    // Replace all occurances with an empty string.
    foreach($result[0] as $img_tag) {
        $text = str_replace($img_tag, '', $text);
    }

    return $text;
}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'nav_menu_item', 'post', 'artists', 'reviews'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );