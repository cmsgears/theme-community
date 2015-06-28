jQuery(document).ready( function() {

	initAjaxListeners();
});

function initAjaxListeners() {

	// Listen for Ajax Forms
	jQuery( ".frm-ajax" ).processAjax();
}

// Forms --------------------------------------------------------------------

function postBTProcessorSuccess( formId, formGroup, formKey, data ) {

	switch( formGroup ) {

		case CONTROLLER_DEFAULT:
		{

			switch( formKey ) {

				case ACTION_LOGIN:
				{
					window.location.replace( siteUrl + "user/home" );

					break;
				}
				case ACTION_AVATAR:
				{
					jQuery( "#" + formId ).parent().hide();

					break;
				}
			}

			break;
		}
	}
}

postAjaxProcessor.addSuccessListener( postBTProcessorSuccess );