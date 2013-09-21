<?php
/**
** A base module for [back]
**/

/* Shortcode handler */

add_action( 'init', 'cf7msm_add_shortcode_back' );

function cf7msm_add_shortcode_back() {
	if (function_exists('wpcf7_add_shortcode'))
		wpcf7_add_shortcode( 'back', 'cf7msm_back_shortcode_handler' );
}

function cf7msm_back_shortcode_handler( $tag ) {
	if (!class_exists('WPCF7_Shortcode') || !function_exists('wpcf7_form_controls_class'))
		return;
	$tag = new WPCF7_Shortcode( $tag );

	$class = wpcf7_form_controls_class( $tag->type );

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_option( 'id', 'id', true );
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

	$value = isset( $tag->values[0] ) ? $tag->values[0] : '';

	if ( empty( $value ) )
		$value = __( 'Back', 'cpf7msm' );

	$atts['type'] = 'button';
	$atts['value'] = $value;

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf( '<input %1$s />', $atts );

	return $html;
}


/* Tag generator */

add_action( 'admin_init', 'cf7msm_add_tag_generator_back', 55 );

function cf7msm_add_tag_generator_back() {
	if ( ! function_exists( 'wpcf7_add_tag_generator' ) )
		return;

	wpcf7_add_tag_generator( 'back', __( 'Back button', 'wpcf7' ),
		'wpcf7-cf7msm-back', 'wpcf7_cf7msm_back', array( 'nameless' => 1 ) );
}

function wpcf7_cf7msm_back( &$contact_form ) {
?>
<div id="wpcf7-cf7msm-back" class="hidden">
<form action="">
<table>
<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>

<td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="class" class="classvalue oneline option" /></td>
</tr>

<tr>
<td><?php echo esc_html( __( 'Label', 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="values" class="oneline" /></td>

<td></td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="back" class="tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}

?>