<?php
/*  Copyright 2012 Webhead LLC (email: info at webheadcoder.com)
	
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

add_action('plugins_loaded', 'contact_form_7_form_codes', 10);

function contact_form_7_form_codes() {
	global $pagenow;
	if(function_exists('wpcf7_add_shortcode')) {
		wpcf7_add_shortcode( 'form', 'wpcf7_form_shortcode_handler', true );
		wpcf7_add_shortcode( 'form*', 'wpcf7_form_shortcode_handler', true );
	} else {
		if($pagenow != 'plugins.php') { return; }
		add_action('admin_notices', 'cfformfieldserror');
		wp_enqueue_script('thickbox');
		function cfformfieldserror() {
			$out = '<div class="error" id="messages"><p>';
			if(file_exists(WP_PLUGIN_DIR.'/contact-form-7/wp-contact-form-7.php')) {
				$out .= 'The Contact Form 7 is installed, but <strong>you must activate Contact Form 7</strong> below for the [form] code to work.';
			} else {
				$out .= 'The Contact Form 7 plugin must be installed for the Form Display code to work. <a href="'.admin_url('plugin-install.php?tab=plugin-information&plugin=contact-form-7&from=plugins&TB_iframe=true&width=600&height=550').'" class="thickbox" title="Contact Form 7">Install Now.</a>';
			}
			$out .= '</p></div>';	
			echo $out;
		}
	}
}

/* Shortcode handler */

function wpcf7_form_shortcode_handler( $tag ) {
	if ( ! is_array( $tag ) )
		return '';
	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values = (array) $tag['values'];

	if ( empty( $name ) )
		return '';

	$atts = '';
	$id_att = '';
	$class_att = '';
	$size_att = '';
	$maxlength_att = '';
	$tabindex_att = '';
	$title_att = '';

	$class_att .= ' wpcf7-form';

	foreach ( $options as $option ) {
		if ( preg_match( '%^id:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$id_att = $matches[1];
		}
	}

	if ( $id_att ) {
		$id_att = trim( $id_att );
	}
	
	$value = '';
	//return raw value, let filters sanitize if needed.
	$cf7msm_posted_data = cf7msm_get('cf7msm_posted_data');

	if ( !empty( $cf7msm_posted_data ) && is_array( $cf7msm_posted_data ) ) {
		$value = isset( $cf7msm_posted_data[$name] ) ? $cf7msm_posted_data[$name] : '';	
	}
	if (is_array($value)) {
	    $value = implode(", ", $value);
	}
	$value = apply_filters('wpcf7_form_field_value', apply_filters('wpcf7_form_field_value_'.$id_att, $value));

	return $value;
}


/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_form', 30 );

function wpcf7_add_tag_generator_form() {
	if(function_exists('wpcf7_add_tag_generator')) {
		wpcf7_add_tag_generator( 'form', __( 'Form value', 'wpcf7' ),
		'wpcf7-tg-pane-form', 'wpcf7_tg_pane_form' );
	}
}

function wpcf7_tg_pane_form() {
?>
<div id="wpcf7-tg-pane-form" class="hidden">
<form action="">

<table>
<tr><td><?php echo esc_html( __( 'Name of previous form field', 'wpcf7' ) ); ?><br /><input type="text" name="name" class="tg-name oneline" /></td><td></td></tr>

<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="form" class="tag" readonly="readonly" onfocus="this.select()" /></div>

<div class="tg-mail-tag"><?php echo esc_html( __( "Mail fields currently not supported.", 'wpcf7' ) ); ?><br /><span class="arrow">&#11015;</span>&nbsp;<input type="text" readonly="readonly" /></div>
</form>
</div>
<?php
}
?>