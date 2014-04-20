<?php
/*
Plugin Name: SH Slideshow
Plugin URI: http://wordpress.org/plugins/sh-slideshow/
Description: Slideshow banner with different effects which is using jQuery Cycle Plugin. Simply for normal users and advanced users.
Version: 4.3
Author: Sam Hoe
Author URI: sg.linkedin.com/pub/sam-hoe/37/604/894/
License: GPLv2 or later
*/

/*  Copyright 2013  Sam Hoe  (email : SH Slideshow Sam Hoe samhoamt@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// Activation
register_activation_hook(__FILE__,'shslideshow_activate');
register_deactivation_hook(__FILE__,'shslideshow_deactivate');

// Add Actions and Filters
add_action('admin_menu','shslideshow_menu');
add_action('wp_enqueue_scripts','shslideshow_script');
add_action('admin_print_scripts', 'shslideshow_admin_scripts');
add_action('admin_print_styles', 'shslideshow_admin_styles');
add_action('wpmu_new_blog', 'new_blog', 10, 6);
add_action('wpmu_drop_tables', 'remove_plugin_table');

/**
 * Plugin activation
 *
 * This function check whether multisite feature enable or not. If enable, the plugin create plugin databases for each blog.
 *
 * @param $networkwide Website activated network or not
 *
 */
function shslideshow_activate($networkwide){
  global $wpdb;

  if(function_exists('is_multisite') && is_multisite()){
    // check if it is a network activation - if so, run the activation function for each blog id
    if($networkwide){
      $old_blog = $wpdb->blogid;
      // Get all blog ids
      $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blogids as $blog_id) {
        switch_to_blog($blog_id);
				_shslideshow_activate();
      }
      switch_to_blog($old_blog);
      return;
    }
  }
	_shslideshow_activate();
}

/**
 * Check plugin database tables
 *
 * This function check whether plugin databases are created. If not, create database tables.
 *
 */
function _shslideshow_activate(){
	global $wpdb;
	$table_prefix = $wpdb->prefix . 'sh_';
	$setting_table = $table_prefix . 'slideshow';
	$slides_table = $table_prefix . 'slides';
	if ($wpdb->get_var( "SHOW TABLES LIKE '{$setting_table}'") != $setting_table && $wpdb->get_var( "SHOW TABLES LIKE '{$slides_table}'") != $slides_table) {
		_shslideshow_create_table($setting_table, $slides_table);
	}
}

/**
 * Create plugin database tables
 *
 * This function create plugin database tables and options.
 *
 * @param $setting_table plugin setting database table name
 * @param $slides_table slideshow slides database table name
 *
 */
function _shslideshow_create_table($setting_table, $slides_table){
	global $wpdb;
	if($wpdb->get_var("SHOW TABLES LIKE 'sh_slideshow'") == 'sh_slideshow'){
		$sql = "CREATE TABLE $setting_table SELECT * FROM sh_slideshow;";
		$sql_delete = "DROP TABLE IF EXISTS sh_slideshow";
	}else{
		$sql = "CREATE TABLE $setting_table (
			id INT NOT NULL AUTO_INCREMENT,
			name VARCHAR(255),
			transition INT,
			timeout INT,
			pause INT,
			auto INT,
			effect VARCHAR(255),
			random INT,
			target VARCHAR(255),
			width INT,
			height INT,
			bgcolor VARCHAR(255),
			nav_transition INT,
			navigation INT,
			nav_type INT,
			nav_pos INT,
			css INT,
			next_text VARCHAR(255),
			prev_text VARCHAR(255),
			nav_spacing INT,
			nav_top INT,
			nav_left INT,
			nav_link_color VARCHAR(255),
			nav_link_hover_color VARCHAR(255),
			nav_link_underline INT,
			UNIQUE KEY id (id)
		);";
	}
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	if($sql_delete){
		$wpdb->query( $sql_delete );
	}

	if($wpdb->get_var("SHOW TABLES LIKE 'sh_slides'") == 'sh_slides'){
		$sql = "CREATE TABLE $slides_table SELECT * FROM sh_slides;";
		$sql_delete = "DROP TABLE IF EXISTS sh_slides";
	}else{
		$sql = "CREATE TABLE $slides_table (
			id INT NOT NULL AUTO_INCREMENT,
			slideshow INT,
			slide VARCHAR(255),
			link_url VARCHAR(255),
			custom_url VARCHAR(255),
			weight INT,
			UNIQUE KEY id (id)
		);";
	}
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	if($sql_delete){
		$wpdb->query( $sql_delete );
	}

	// Add options
	add_option('sh_ss_permission', 8); // User permission: 8=Administrator; 3=Editor; 2=Author; 1=Contributor
	add_option('sh_ss_drop_database', 0); // Drop all of the databases after plugin was deactivated
}

/**
 * Plugin Deactivation
 *
 * @param $networkwide Website activated network or not
 *
 */
function shslideshow_deactivate($networkwide){
	global $wpdb;

	if(function_exists('is_multisite') && is_multisite()){
    // check if it is a network activation - if so, run the activation function for each blog id
    if($networkwide){
      $old_blog = $wpdb->blogid;
      // Get all blog ids
      $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blogids as $blog_id) {
        switch_to_blog($blog_id);
				_shslideshow_deactivate();
      }
      switch_to_blog($old_blog);
      return;
    }
  }
	_shslideshow_deactivate();
}

/**
 * Plugin Deactivation
 *
 * Clear plugin data from database.
 *
 */
function _shslideshow_deactivate(){
	if(get_option('sh_ss_drop_database')){
		global $wpdb;
		$table_prefix = $wpdb->prefix . 'sh_';
		$setting_table = $table_prefix . 'slideshow';
		$slides_table = $table_prefix . 'slides';
		$wpdb->query("DROP TABLE $setting_table, $slides_table");
	}
	delete_option('sh_ss_permission');
	delete_option('sh_ss_drop_database');
}

/**
 * Create database tables for new blog
 *
 * @param $blog_id New blog ID
 *
 */
function new_blog($blog_id, $user_id, $domain, $path, $site_id, $meta) {
  global $wpdb;

  if (is_plugin_active_for_network('sh-slideshow/shslideshow.php')) {
    $old_blog = $wpdb->blogid;
    switch_to_blog($blog_id);
    _shslideshow_activate();
    switch_to_blog($old_blog);
  }
}

/**
 * Remove plugin database tables
 *
 * Remove plugin database tables from deleted blog.
 *
 * @param $tables Deleted blog database tables
 *
 */
function remove_plugin_table($tables) {
  global $wpdb;
	$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
	$tables[] = $wpdb->get_blog_prefix($id).'sh_slideshow';
	$tables[] = $wpdb->get_blog_prefix($id).'sh_slides';
	return $tables;
}

/**
 * Add plugin menu
 *
 */
function shslideshow_menu(){
	$tmp = basename(dirname(__FILE__)); // Plugin folder
	$permission = get_option('sh_ss_permission', 8);
	add_menu_page('SH Slideshow', 'SH Slideshow', $permission, $tmp.'/manage.php');
	add_submenu_page($tmp.'/manage.php', 'SH Slideshow', 'Manage', $permission, $tmp.'/manage.php');
	add_submenu_page($tmp.'/manage.php', 'SH Slideshow Settings', 'Settings', 8, $tmp.'/settings.php');
}

/**
 * Add javascript
 *
 * Add javascript that plugin needed.
 *
 */
function shslideshow_script(){
	wp_register_script('jQuery-Cycle', WP_PLUGIN_URL.'/sh-slideshow/jquery.cycle.all.js', array('jquery'));
	wp_enqueue_script('jQuery-Cycle');
}

/**
 * Add javascript for admin
 *
 * Add javascript that plugin needed for admin page.
 *
 */
function shslideshow_admin_scripts() {
	$tmp = basename(dirname(__FILE__)); // Plugin folder
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', WP_PLUGIN_URL.'/sh-slideshow/uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	wp_enqueue_script('jquery-ui-sortable');
}

/**
 * Add css for admin
 *
 * Add css that plugin needed for admin page.
 *
 */
function shslideshow_admin_styles() {
	wp_enqueue_style('thickbox');
}

/**
 * Shortcode for template file
 *
 * This is use in template files like index.php, page.php, etc... For Example: <?php shslideshow(1); ?>
 *
 * @return Print the whole set of coding to display slideshow and effects.
 *
 */
function shslideshow($id){
	echo _shslideshow($id);
}

/**
 * Shortcode
 *
 * This is use in Pages or Posts. For example: [shslideshow id="1"]
 *
 * @return Print the whole set of coding to display slideshow and effects.
 *
 */
function shslideshow_shortcode($atts,$content = null){
	ob_start();
	echo _shslideshow($atts['id']);
	$content = ob_get_clean();
	return $content;
}

add_shortcode('shslideshow', 'shslideshow_shortcode');
add_shortcode('shminislideshow', 'shslideshow_shortcode');

/**
 * Generate slideshow
 *
 * Generate the coding (HTML, CSS, Javascript) for slideshow
 *
 * @param $id Slideshow ID
 *
 */
function _shslideshow($id){
	global $wpdb;
	$table_prefix = $wpdb->prefix . 'sh_';
	$setting_table = $table_prefix . 'slideshow';
	$slides_table = $table_prefix . 'slides';

	$slideshow = $wpdb->get_row('select * from '.$setting_table.' where id='.$id);
	$slides = $wpdb->get_results('select * from '.$slides_table.' where slideshow='.$id.' order by weight');
	$total_slides = count($slides);
	$return = '';
	if($slideshow->css):
	// Style
	$return .= '<style type="text/css">
div#shslideshow_'.$id.'{
	width:'.$slideshow->width.'px;
	background-color:'.$slideshow->bgcolor.';
	margin:auto;
}
div#shslideshow_'.$id.' div.slides{
	position:relative;
	width:100%;
	height:'.$slideshow->height.'px;
	z-index:1;
	overflow: hidden;
}
div#shslideshow_'.$id.' div.slides a, div#shslideshow_'.$id.' div.slides img{
	position:absolute;
	top:0px;
	left:0px;
}
div#shslideshow_'.$id.' div.slides img{
	width:'.$slideshow->width.'px;
	height:'.$slideshow->height.'px;
}
div#shslideshow_nav_'.$id.'{
	margin-left:'.$slideshow->nav_left.'px;
}
div#shslideshow_nav_pre_'.$id.',div#shslideshow_nav_next_'.$id.'{
	display:block;
	float:left;
}
div#shslideshow_nav_pre_'.$id.':hover,div#shslideshow_nav_next_'.$id.':hover{
	cursor:pointer;
}
div#shslideshow_nav_'.$id.' a,div#shslideshow_nav_pre_'.$id.',div#shslideshow_nav_next_'.$id.'{
	margin-right: '.$slideshow->nav_spacing.'px;
	color:'.$slideshow->nav_link_color.';
}
div#shslideshow_nav_'.$id.' a:hover,div#shslideshow_nav_'.$id.' a.activeSlide,div#shslideshow_nav_pre_'.$id.':hover,div#shslideshow_nav_next_'.$id.':hover{
	color:'.$slideshow->nav_link_hover_color.';
}';
if($slideshow->nav_pos):
	$return .= 'div#shslideshow_nav_'.$id.'{ position:absolute;';
	if($slideshow->nav_top < 0):
		$return .= 'margin-top:'.$slideshow->nav_top.'px;';
	else:
		$return .= 'margin-top:-'.$slideshow->nav_top.'px;';
	endif;
	$return .= 'z-index:5; }';
else:
	$return .= 'div#shslideshow_nav_'.$id.'{ padding-top:'.$slideshow->nav_top.'px; }';
endif;
if($slideshow->nav_link_underline):
$return .= 'div#shslideshow_nav_'.$id.' a,div#shslideshow_nav_pre_'.$id.',div#shslideshow_nav_next_'.$id.'{
	text-decoration:underline;
}';
else:
$return .= 'div#shslideshow_nav_'.$id.' a,div#shslideshow_nav_pre_'.$id.',div#shslideshow_nav_next_'.$id.'{
	text-decoration:none;
}';
endif;
$return .= '</style>';
endif;
	$return .= '<div id="shslideshow_'.$id.'" class="shslideshow">';
	$return .= '<div class="slides">';
	foreach($slides as $slide):
		if($slide->link_url == 'manual'):
			if($slide->custom_url == ''):
				$return .= '<img src="'.$slide->slide.'" alt="" />';
			else:
				$return .= '<a href="'.$slide->custom_url.'" title="" target="'.$slideshow->target.'"><img src="'.$slide->slide.'" alt="" /></a>';
			endif;
		elseif($slide->link_url == 0):
			$return .= '<img src="'.$slide->slide.'" alt="" />';
		else:
			$permalink = get_permalink($slide->link_url);
			$title = get_the_title($slide->link_url);
			$return .= '<a href="'.$permalink.'" title="'.$title.'" target="'.$slideshow->target.'"><img src="'.$slide->slide.'" alt="" /></a>';
		endif;
	endforeach;
	$return .= '</div>';
	if(($slideshow->navigation == 1)&&($total_slides >1)):
		$return .= '<div id="shslideshow_nav_'.$id.'" class="shslideshow_nav">';
		if($slideshow->nav_type == 2):
			$return .= '<div id="shslideshow_nav_pre_'.$id.'" class="shslideshow_nav_pre">'.$slideshow->prev_text.'</div>';
			$return .= '<div id="shslideshow_nav_next_'.$id.'" class="shslideshow_nav_next">'.$slideshow->next_text.'</div>';
		endif;
		$return .= '</div>';
	endif;
	$return .= '</div>';

	// Script
	switch($slideshow->random):
		case 0:
			$randomEffects = 0;
			$random = 0;
		break;
		case 1:
			$randomEffects = 1;
			$random = 0;
		break;
		case 2:
			$randomEffects = 0;
			$random = 1;
		break;
		case 3:
			$randomEffects = 1;
			$random = 1;
		break;
	endswitch;
	$return .= '<script language="javascript">
	jQuery(document).ready(function(){
		jQuery("#shslideshow_'.$id.' .slides").cycle({
			fx: "'.$slideshow->effect.'",
			pause:'.$slideshow->pause.',
			randomizeEffects:'.$randomEffects.',
			random:'.$random.',
			fastOnEvent:'.($slideshow->nav_transition*1000).',
			fit:1,
			speed: '.($slideshow->transition*1000).',';
if($slideshow->navigation):
	if($slideshow->nav_type == 1):
		$return .= 'pager: "#shslideshow_nav_'.$id.'",';
	elseif($slideshow->nav_type == 2):
		$return .= 'next: "#shslideshow_nav_next_'.$id.'", prev: "#shslideshow_nav_pre_'.$id.'",';
	endif;
endif;
if($slideshow->auto == 0):
	$return .= 'timeout: 0,';
elseif($slideshow->auto == 2):
	$return .= 'autostop: 1,';
	$return .= 'timeout: '.($slideshow->timeout*1000);
elseif($slideshow->auto == 3):
	$return .= 'autostop: 1,';
	$return .= 'autostopCount: '.($total_slides+1).',';
	$return .= 'timeout: '.($slideshow->timeout*1000);
else:
	$return .= 'timeout: '.($slideshow->timeout*1000);
endif;
$return .= '});
	});
</script>
	';
	return $return;
}
?>