jQuery(document).ready( function() {

	initLanding();

	initModules();

	initListeners();
});

function initLanding() {

	// perspective header
	if( jQuery().cmtHeader ) {

		jQuery( "#header" ).cmtHeader( { scrollDistance: 500 } );
	}

	// smooth scroll
	if( jQuery().cmtSmoothScroll ) {

		jQuery( ".smooth-scroll" ).cmtSmoothScroll();
	}
}

function initModules() {

	// Page Modules
	if( jQuery().cmtPageModule ) {

		jQuery( ".module" ).cmtPageModule( {
			fullHeight: true,
			modules: {
				'module-about': { heightAutoMobile: true, heightAutoWidth: 1024 },
				'module-contact': { heightAutoMobile: true, heightAutoWidth: 1024 }
			}
		});
	}
}

function initListeners() {

	// Show pre-loader spinner
	jQuery( '#pre-loader-page' ).fadeIn();

	// Hide pre-loader spinner
	jQuery( 'body' ).imagesLoaded( function() {

		jQuery( '#pre-loader-page' ).fadeOut( "slow" );
	});

	// Initialise the mobile button
	jQuery( "#btn-mobile-menu" ).click( function() {

		jQuery( "#nav-mobile" ).slideToggle( "slow" );
	});

	// Show/ Hide login box
	jQuery("#btn-login, #btn-login-mobile").click( function() {

		jQuery( "#wrap-login-register" ).toggle( "slow" );
	});

	// Show/ Hide settings box
	jQuery("#btn-settings, #btn-settings-mobile").click( function( e ) {

		e.preventDefault();

		jQuery( "#box-settings" ).toggle( "slow" );
	});
	
	// File Uploader
	if( jQuery().cmtFileUploader ) {

		jQuery( '.file-uploader' ).cmtFileUploader();
	}
}