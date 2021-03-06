<?php
/**
 * Shortcodes
 *
 * @package turner-batson
 */

add_shortcode( 'tagline', 'turnerbatson_tagline_shortcode' );

function turnerbatson_tagline_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'theme' => 'none',
	), $atts );

	if ( $a['theme'] === 'people-red' ) :
		$people = __( '<span class="text-primary">People.</span>', THEME_NAME );
		$passion = __( 'Passion.', THEME_NAME ); 
		$purpose = __( 'Purpose.', THEME_NAME );
	elseif ( $a['theme'] === 'stack' ) :
		$people = __( '<span class="block">People.</span>', THEME_NAME );
		$passion = __( '<span class="block">Passion.</span>', THEME_NAME ); 
		$purpose = __( '<span class="block">Purpose.</span>', THEME_NAME );
	else :
		$people = __( 'People.', THEME_NAME );
		$passion = __( 'Passion.', THEME_NAME );
		$purpose = __( 'Purpose.', THEME_NAME );
	endif;

	$words = array(
		$people,
		$passion,
		$purpose,
	);
	return implode( ' ', $words );
}

add_shortcode( 'logo', 'tb_logo_shortcode');

function tb_logo_shortcode( $atts = array() ) {

	$a = shortcode_atts( array(
		'classname' => 'w-8',
		'sticky' => 'false'
	), $atts );

	ob_start(); ?>

<?php if ($sticky = ( 'true' === $a['sticky'] ) ) : ?>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="<?php echo $a['classname']; ?>" data-sticky data-sticky-buffer="20px" data-sticky-top="20px" data-sticky-left="20px">
<?php else : ?>
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="<?php echo $a['classname']; ?>">
<?php endif; ?>
		<path class="fill-back" d="M0 0h99.71v99.8H0z" fill="#FFFFFF" />
		<path class="fill-front" d="M20.44 40.37L0 66.28V40.37h20.44zM28.64 29.97H0V0h52.29L28.64 29.97zM7.45 73.6l26.22-33.23h23c8.54 0 14.73 6.76 14.73 16.08v1.06A16.1 16.1 0 0 1 55.27 73.6z" fill="#DA291C" />
		<path class="fill-front" d="M100 0v100H0V84h55.27a26.51 26.51 0 0 0 26.47-26.49v-1.06C81.74 41.36 71 30 56.63 30H41.87L65.52 0z" fill="#DA291C" />
	</svg>
		
	<?php return ob_get_clean();
}

add_shortcode( 'name', 'tb_name_shortcode');

function tb_name_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'classname' => 'h-2',
		'in-color' => 'false',
	), $atts );

	$fill_one = ( 'true' === $a['in-color'] ) ? '#3f4243' : '#ffffff';
	$fill_two = ( 'true' === $a['in-color'] ) ? '#da291c' : '#ffffff' ;

	ob_start(); ?>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 325.83 23.29" class="<?php echo $a['classname']; ?>">
		<path fill="<?php echo $fill_one; ?>" d="M0 .38v3.24h7.58v19.29h3.62V3.62h7.62V.38zM43.69.38V14a5.91 5.91 0 0 1-1.57 4.41 5.55 5.55 0 0 1-4 1.54A5.65 5.65 0 0 1 34 18.44 5.84 5.84 0 0 1 32.42 14V.38H28.8V13.8a9.3 9.3 0 0 0 2.58 6.94 9.12 9.12 0 0 0 6.71 2.55 9 9 0 0 0 6.64-2.55 9.3 9.3 0 0 0 2.58-6.94V.38zM71.12 13.62a6.58 6.58 0 0 0 3.19-2.45 6.71 6.71 0 0 0 1.15-3.9 6.39 6.39 0 0 0-2.12-5A7.9 7.9 0 0 0 67.81.38h-8.23v22.53h3.62v-8.7h4.13l6.42 8.7h4.13zM67.74 11H63.2V3.59h4.54a4.08 4.08 0 0 1 2.94 1 3.6 3.6 0 0 1 1.06 2.7A3.55 3.55 0 0 1 70.68 10a4.08 4.08 0 0 1-2.94 1zM102.92.38v15.19L89.23 0H88v22.91h3.62V7.68l13.72 15.61h1.23V.38zM122.71 19.67v-7.14h8.43V9.39h-8.43V3.62h11.2V.38h-14.82v22.53h15.23v-3.24zM156.9 13.62a6.58 6.58 0 0 0 3.19-2.45 6.71 6.71 0 0 0 1.15-3.9 6.39 6.39 0 0 0-2.12-5 7.92 7.92 0 0 0-5.53-1.89h-8.23v22.53H149v-8.7h4.13l6.42 8.7h4.13zM153.52 11H149V3.59h4.54a4.08 4.08 0 0 1 2.94 1 3.59 3.59 0 0 1 1 2.7 3.55 3.55 0 0 1-1 2.66 4.08 4.08 0 0 1-2.96 1.05z"/>
		<path fill="<?php echo $fill_two; ?>" d="M189.61 12.77a6 6 0 0 0-3.13-2.15 5.24 5.24 0 0 0 1.92-4.23 5.57 5.57 0 0 0-1.86-4.34 7.05 7.05 0 0 0-4.9-1.67h-7.89v22.53h9.66a7.51 7.51 0 0 0 5.29-1.84 6.08 6.08 0 0 0 2-4.71 5.87 5.87 0 0 0-1.09-3.59zM177.3 3.55h4a3.78 3.78 0 0 1 2.58.8 2.82 2.82 0 0 1 .91 2.21 2.91 2.91 0 0 1-.91 2.23 3.64 3.64 0 0 1-2.58.84h-4zM186 18.8a4.22 4.22 0 0 1-2.92.94h-5.8v-7h5.8a4.17 4.17 0 0 1 2.92.95 3.3 3.3 0 0 1 1 2.56 3.25 3.25 0 0 1-1 2.55zM209.07 0h-1.23l-9.94 22.91h3.86l1.61-3.75h10.14l1.6 3.75H219zm-4.37 16.05l3.75-9.36 3.72 9.36zM223.11.38v3.24h7.58v19.29h3.62V3.62h7.62V.38zM263.89 13.08a12.43 12.43 0 0 0-4.06-2.73l-2.53-1.16a11.86 11.86 0 0 1-2.42-1.44 2.2 2.2 0 0 1-.72-1.75 2.35 2.35 0 0 1 1-2 4.15 4.15 0 0 1 2.43-.7 5.48 5.48 0 0 1 4.73 2.7l2.53-2a8.08 8.08 0 0 0-3-2.92A8.43 8.43 0 0 0 257.58 0a7.67 7.67 0 0 0-5.06 1.69 5.48 5.48 0 0 0-2.05 4.42 5.15 5.15 0 0 0 1.39 3.66 12 12 0 0 0 3.87 2.59l2.49 1.16a11 11 0 0 1 2.55 1.5 2.41 2.41 0 0 1 .77 1.88 2.77 2.77 0 0 1-1.08 2.29 4.39 4.39 0 0 1-2.82.85q-3.4 0-5.9-3.58l-2.56 1.95a9.43 9.43 0 0 0 3.51 3.59 9.65 9.65 0 0 0 5 1.3 8.15 8.15 0 0 0 5.41-1.79 5.9 5.9 0 0 0 2.13-4.73 5.28 5.28 0 0 0-1.34-3.7zM294 3.36a12.13 12.13 0 0 0-16.76 0 11.15 11.15 0 0 0-3.43 8.28 11.12 11.12 0 0 0 3.43 8.28 12.1 12.1 0 0 0 16.76 0 11.08 11.08 0 0 0 3.47-8.28A11.11 11.11 0 0 0 294 3.36zm-2.56 14.24a8.25 8.25 0 0 1-11.59 0 8.3 8.3 0 0 1-2.29-6 8.2 8.2 0 0 1 2.29-5.94 8.26 8.26 0 0 1 11.58 0 8.15 8.15 0 0 1 2.32 5.92 8.24 8.24 0 0 1-2.31 6.02zM322.21.38v15.19L308.51 0h-1.26v22.91h3.62V7.68l13.73 15.61h1.23V.38z"/>
	</svg>
		
	<?php return ob_get_clean();
}

add_shortcode( 'slider_nav', 'tb_slider_nav_shortcode');

function tb_slider_nav_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'large' => 'false',
		'type' => 'prev',
		'vertical' => 'false',
		'secondary' => 'false',
	), $atts );

	
	$is_large = $a['large'] === 'true';
	$is_vertical = $a['vertical'] === 'true';
	$is_secondary = $a['secondary'] === 'true';

	ob_start(); ?>

	<button class="button-slider button-slider-<?php echo $a['type']; ?><?php echo $is_large ? ' button-slider-large' : ''; ?><?php echo $is_vertical ? ' button-slider-vertical' : ''; ?><?php echo $is_secondary ? ' button-slider-secondary' : ''; ?>" data-slider-<?php echo $a['type']; ?>>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 18" class="button-slider-arrow">
			<path class="button-slider-arrow-fill" fill-rule="evenodd" d="M10.886 2.4L4.286 9l6.6 6.6L9 17.485.515 9 9 .515 10.886 2.4z"/>
		</svg>
	</button>
		
	<?php return ob_get_clean();
}

add_shortcode( 'loader', 'tb_loader_shortcode');

function tb_loader_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'dark' => 'false',
	), $atts );

	
	$color = $a['dark'] === 'true' ? '#3F4243' : '#FFFFFF';

	ob_start(); ?>

	<svg class="loader" width="57" height="57" viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg" stroke="<?php echo $color; ?>">
			<g fill="none" fill-rule="evenodd">
					<g transform="translate(1 1)" stroke-width="2">
							<circle cx="5" cy="50" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											values="50;5;50;50"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											begin="0s" dur="2.2s"
											values="5;27;49;5"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
							<circle cx="27" cy="5" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											from="5" to="5"
											values="5;50;50;5"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											begin="0s" dur="2.2s"
											from="27" to="27"
											values="27;49;5;27"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
							<circle cx="49" cy="50" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											values="50;50;5;50"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											from="49" to="49"
											begin="0s" dur="2.2s"
											values="49;5;27;49"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
					</g>
			</g>
	</svg>
		
	<?php return ob_get_clean();
}