<?php
/**
 * Shortcodes
 *
 * @package turner-batson
 */

add_shortcode( 'tagline', 'turnerbatson_tagline_shortcode' );

function turnerbatson_tagline_shortcode( $atts = array(), $content = null, $shortcode = 'tagline' ) {
	$atts = shortcode_atts( array(
		'bold' => false,
	), $atts );

	$people = false !== $atts['bold'] ? '<strong>' . __( 'People.', 'turner-batson' ) . '</strong>' : __( 'People.', 'turner-batson' );

	$words = array(
		$people,
		__( 'Passion.', 'turner-batson' ),
		__( 'Purpose.', 'turner-batson' ),
	);
	return '<span class="tagline">' . implode( ' ', $words ) . '</span>';
}
