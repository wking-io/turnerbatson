/**
 * Turner Batson entry point.
 *
 * @package Theme\JS
 * @author  Briantics
 * @license GPL-2.0+
 */

var Theme = ( function( $ ) {
	'use strict';

	/**
	 * Initialize Turner Batson.
	 *
	 * Internal functions to execute on document load can be called here.
	 *
	 * @since 2.0.0
	 */
	var init = function() {

	};

	// Expose the init function only.
	return {
		init: init
	};

})( jQuery );

jQuery( window ).on( 'load', Theme.init );
