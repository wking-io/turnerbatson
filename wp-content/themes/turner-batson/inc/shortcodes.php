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

add_shortcode( 'logo', 'tb_logo_shortcode');

function tb_logo_shortcode( $atts = array() ) {

	$a = shortcode_atts( array(
		'classname' => 'w-8',
	), $atts );

	ob_start(); ?>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="<?php echo $a['classname']; ?>">
		<path d="M0 0h99.71v99.8H0z" fill="#FFFFFF" />
		<path d="M20.44 40.37L0 66.28V40.37h20.44zM28.64 29.97H0V0h52.29L28.64 29.97zM7.45 73.6l26.22-33.23h23c8.54 0 14.73 6.76 14.73 16.08v1.06A16.1 16.1 0 0 1 55.27 73.6z" fill="#DA291C" />
		<path d="M100 0v100H0V84h55.27a26.51 26.51 0 0 0 26.47-26.49v-1.06C81.74 41.36 71 30 56.63 30H41.87L65.52 0z" fill="#DA291C" />
	</svg>
		
	<?php return ob_get_clean();
}
