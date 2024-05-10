/**
 * Script for the customizer tabs control focus function.
 *
 * @since    0.1
 * @package Wallstreet

 */

/* global wp */

var wallstreet_customize_tabs_focus = function ( $ ) {
	'use strict';
	$(
		function () {
				var customize = wp.customize;
				$( '.customize-partial-edit-shortcut' ).on(
					'click', function () {
						$( this ).on(
							'click', function() {
								var controlId     = $( this ).attr( 'class' );
								var tabToActivate = '';

								if ( controlId.indexOf( 'widget' ) !== -1 ) {
									tabToActivate = $( '.wallstreet-customizer-tab>.widgets' );
								} else {
									var controlFinalId = controlId.split( ' ' ).pop().split( '-' ).pop();
									tabToActivate      = $( '.wallstreet-customizer-tab>.' + controlFinalId );
								}

								customize.preview.send( 'tab-previewer-edit', tabToActivate );
							}
						);
					}
				);
		}
	);
};

wallstreet_customize_tabs_focus( jQuery );
