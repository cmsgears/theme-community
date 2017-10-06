/*
 * Dependencies: jquery, cmt-core
 */

// TODO: remove JQuery plugin and make it under Cmt namespace
// TODO: Change Form Group to Controller Classes and Keys to Controller Actions
// TODO: Add Data Binding Support
// TODO: Add Data Binding with Pagination for Data Grid
// TODO: Add Page History and Caching Support

// Default Controller
var CONTROLLER_DEFAULT	= 'default';

// Default Controller Actions
var ACTION_DEFAULT		=  'default';
var ACTION_REGISTER		=  'register';
var ACTION_LOGIN		=  'login';
var ACTION_AVATAR		=  'avatar';

/**
 * JQuery Plugin for CMGTools Ajax Processor to process remote request.
 */
( function( cmt ) {

	cmt.fn.processAjax = function( options ) {

		// == Init == //

		// Configure Modules
		var settings 		= cmt.extend( {}, cmt.fn.processAjax.defaults, options );
		var ajaxCallers		= this;

		// Iterate and initialise all the fox sliders
		ajaxCallers.each( function() {

			var ajaxCaller = cmt( this );

			init( ajaxCaller );
		});

		// return control
		return;

		// == Private Functions == //

		// Initialise Module
		function init( ajaxCaller ) {

			if( settings.form ) {

				ajaxCaller.submit( function( event ) {

					event.preventDefault();

					var formId			= jQuery( this ).attr( "id" );
					var controllerId	= jQuery( this ).attr( "cmt-controller" );
					var actionId		= jQuery( this ).attr( "cmt-action" );

					if( null == controllerId ) {

						controllerId = CONTROLLER_DEFAULT;
					}

					if( null == actionId ) {

						actionId = ACTION_DEFAULT;
					}

					if( settings.json ) {

						Cmt.remote.handleRestForm( formId, controllerId, actionId );
					}
					else {

						Cmt.remote.handleAjaxForm( formId, controllerId, actionId );
					}
				});
			}
			else {

				jQuery( ajaxCaller ).find( ".cmt-submit" ).click( function( e ) {

					e.preventDefault();

					var request			= jQuery( "#" + jQuery( this ).attr( "cmt-request" ) );
					var elementId		= request.attr( "id" );
					var controllerId	= request.attr( "cmt-controller" );
					var actionId		= request.attr( "cmt-action" );

					if( null == controllerId ) {

						controllerId = CONTROLLER_DEFAULT;
					}

					if( null == actionId ) {

						actionId = ACTION_DEFAULT;
					}

					Cmt.remote.handleAjaxRequest( elementId, controllerId, actionId );
				});
			}
		}
	};

	// Default Settings
	cmt.fn.processAjax.defaults = {
		form: true,
		json: false
	};

}( jQuery ) );

/**
 * CMGTools Ajax Processor to process remote request.
 */
Cmt.remote = {

	errorClass: 'error',
	messageClass: 'message',
	spinnerClass: 'spinner',

	handleAjaxForm: function( formId, controllerId, actionId ) {

		var form		= jQuery( "#" + formId );
		var httpMethod	= form.attr( "method" );
		var actionUrl	= form.attr( "action" );
		var message		= jQuery( "#" + formId + " ." + this.messageClass );

		// Hide message
		message.hide();

		// Hide all errors
		jQuery( "#" + formId + " ." + this.errorClass ).hide();

		// Pre Process Form
		if( !preAjaxProcessor.processPre( formId, controllerId, actionId ) ) {

			return false;
		}

		// Generate form data for submission
		var formData	= Cmt.utils.serialiseForm( formId );

		// Show Spinner
		jQuery( "#" + formId + " ." + this.spinnerClass ).show();

		jQuery.ajax( {
			type: httpMethod,
			url: actionUrl,
			data: formData,
			dataType: "JSON",
			success: function( response, textStatus, XMLHttpRequest ) {

				// Process response
				Cmt.remote.processAjaxResponse( formId, controllerId, actionId, message, response );
			}
		});

		return false;
	},

	handleRestForm: function( formId, controllerId, actionId ) {

		var form		= jQuery( "#" + formId );
		var httpMethod	= form.attr( "method" );
		var actionUrl	= form.attr( "action" );
		var message		= jQuery( "#" + formId + " ." + this.messageClass );

		// Hide message
		message.hide();

		// Hide all errors
		jQuery( "#" + formId + " ." + this.errorClass ).hide();

		// Pre Process Form
		if( !preAjaxProcessor.processPre( formId, controllerId, actionId ) ) {

			return false;
		}

		// Generate form data for submission
		var formData	= Cmt.utils.formToJson( formId );

		// Show Spinner
		jQuery( "#" + formId + " ." + this.spinnerClass ).show();

		jQuery.ajax({
			type: httpMethod,
			url: actionUrl,
			data: JSON.stringify( formData ),
			dataType: "JSON",
			contentType: "application/json;charset=UTF-8",
			success: function( response, textStatus, XMLHttpRequest ) {

				// Process response
				Cmt.remote.processAjaxResponse( formId, controllerId, actionId, message, response );
			}
		});

		return false;
	},

	handleAjaxRequest: function( elementId, controllerId, actionId ) {

		var element		= jQuery( "#" + elementId );
		var httpMethod	= form.attr( "method" );
		var actionUrl	= form.attr( "action" );
		var message		= jQuery( "#" + elementId + " ." + this.messageClass );

		if( null == httpMethod ) {

			httpMethod = 'post';		
		}

		// Hide message
		message.hide();

		// Hide all errors
		jQuery( "#" + elementId + " ." + this.errorClass ).hide();

		// Pre Process Request
		if( !preAjaxProcessor.processPre( elementId, controllerId, actionId ) ) {

			return false;
		}

		// Generate request data for submission
		var requestData	= Cmt.utils.serialiseElement( elementId );

		// Show Spinner
		jQuery( "#" + elementId + " ." + this.spinnerClass ).show();

		jQuery.ajax({
			type: "POST",
			url: actionUrl,
			data: requestData,
			dataType: "JSON",
			success: function( response, textStatus, XMLHttpRequest ) {

				// Process response
				Cmt.remote.processAjaxResponse( elementId, controllerId, actionId, message, response );
			}
		});

		return false;
	},

	processAjaxResponse: function( requestId, controllerId, actionId, message, response ) {

		var result 		= response['result'];
		var messageStr 	= response['message'];
		var data		= response['data'];
		var errors		= response['errors'];

		if( result == 1 ) {
			
			// Show message
			message.html( messageStr );
			message.show();

			// Hide all errors
			jQuery( "#" + requestId + " ." + this.errorClass ).hide();

			// Hide Spinner
			jQuery( "#" + requestId + " ." + this.spinnerClass ).hide();

			// Check to keep form data
			var keepData = jQuery( "#" + requestId ).attr( "cmt-keep-data" );

			if( !keepData ) {

				// Clear all form fields
				jQuery( "#" + requestId + " input[type='text']" ).val( '' );
				jQuery( "#" + requestId + " input[type='password']" ).val( '' );
				jQuery( "#" + requestId + " textarea" ).val( '' );
			}

			// Pass the data for post processing
			postAjaxProcessor.processSuccess( requestId, controllerId, actionId, data );
		}
		else if( result == 0 ) {

			// Show message
			message.html( messageStr );
			message.show();

			// Hide Spinner
			jQuery( "#" + requestId + " ." + this.spinnerClass ).hide();

			// Show Errors
			for( var key in errors ) {

	        	var fieldName 		= key;
	        	var errorMessage 	= errors[key];
	        	var errorField		= jQuery( "#" + requestId + " span[cmt-error='" + fieldName + "']" );

	        	errorField.html( errorMessage );
	        	errorField.show();
	    	}

			postAjaxProcessor.processFailure( requestId, controllerId, actionId, data );
		}
	}
};

/* Ajax Pre Processor */

function PreAjaxProcessor() {
	
	this.formListeners	= Array();
}

PreAjaxProcessor.prototype.addListener = function( listener ) {
	
	this.formListeners.push( listener );
};

PreAjaxProcessor.prototype.processPre = function( requestId, group, key ) {

	var formListeners	= this.formListeners;
	var length 			= formListeners.length;

	for( var i = 0; i < length; i++ ) {

		if( !formListeners[i]( requestId, group, key ) ) {

			return false;
		}
	}

	return true;
};

/* Ajax Post Processor */

function PostAjaxProcessor() {
	
	this.successListeners	= Array();
	this.failureListeners	= Array();
}

PostAjaxProcessor.prototype.addSuccessListener = function( listener ) {
	
	this.successListeners.push( listener );
};

PostAjaxProcessor.prototype.addFailureListener = function( listener ) {
	
	this.failureListeners.push( listener );
};

PostAjaxProcessor.prototype.processSuccess = function( requestId, group, key, data ) {

	var successListeners	= this.successListeners;
	var length 				= successListeners.length;

	for( var i = 0; i < length; i++ ) {

		successListeners[i]( requestId, group, key, data );
	}
};

PostAjaxProcessor.prototype.processFailure = function( requestId, group, key, data ) {

	var failureListeners	= this.failureListeners;
	var length 				= failureListeners.length;

	for( var i = 0; i < length; i++ ) {

		failureListeners[i]( requestId, group, key, data );
	}
};

/* Core - Pre Ajax Processor */

function processCoreAjaxPre( requestId, group, key ) {

	return true;
}

/* Core - Post Ajax Processor */

function processCoreAjaxSuccess( requestId, group, key, data ) {

}

function processCoreAjaxFailure( requestId, group, key, data ) {

}

/* Initialise Form Processors */

var preAjaxProcessor	= new PreAjaxProcessor();
var postAjaxProcessor	= new PostAjaxProcessor();

preAjaxProcessor.addListener( processCoreAjaxPre );
postAjaxProcessor.addSuccessListener( processCoreAjaxSuccess );
postAjaxProcessor.addFailureListener( processCoreAjaxFailure );