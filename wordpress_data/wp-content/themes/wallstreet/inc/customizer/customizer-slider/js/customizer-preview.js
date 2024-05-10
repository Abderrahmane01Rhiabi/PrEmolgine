jQuery( document ).ready(function($) {
	// Change the width of logo
	wp.customize('wallstreet_logo_length', function(control) {
		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});
	});

	// Change the container width
	wp.customize('header_container_width', function(control) {
		control.bind(function( containerWidth ) {
		$('.navbar .container').css('width', containerWidth + 'px');
		});
	});
	
	// Change the container width
	wp.customize('footer_container_width', function(control) {
		control.bind(function( footercontainerWidth ) {
		$('.footer_section .container').css('width', footercontainerWidth + 'px');
		});
	});
	
});