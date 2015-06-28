<?php
namespace themes\basic\assets;

// Yii Imports
use \Yii;
use yii\web\AssetBundle;
use yii\web\View;

class PrivateAssetBundle extends AssetBundle {

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();

		// Path Configuration

	    $this->sourcePath = dirname( __DIR__ ) . '/resources';

		// Load CSS
	    $this->css     = [
			"styles/private.css"
	    ];

		// Load Javascript
	    $this->js      = [
            "scripts/vendor/conditionizr-4.4.0.min.js",
            "conditionizr/detects/ie6-ie7-ie8-ie9.js",
            "scripts/vendor/imagesloaded.pkgd-3.1.8.min.js",
			"scripts/cmgtools/cmt-core.js",
            "scripts/cmgtools/cmt-ajax-processor.js",
            "scripts/cmgtools/cmt-file-uploader.js",
            "scripts/main.js",
            "scripts/ajax-processor.js"
	    ];

		// Define the Position to load Assets
	    $this->jsOptions = [
	        "position" => View::POS_END
	    ];

		// Define dependent Asset Loaders
	    $this->depends = [
			'yii\web\JqueryAsset'
	    ];
	}

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$inlineScript	= "conditionizr.config({
			assets: 'conditionizr/resources/',
		        tests: {
		        ie6: [ 'script', 'style', 'class' ],
		        ie7: [ 'script', 'style', 'class' ],
		        ie8: [ 'script', 'style', 'class' ]
		        }
		    });

    		conditionizr.polyfill( 'scripts/vendor/html5shiv.min.js', [ 'ie6', 'ie7', 'ie8' ] );
    		conditionizr.polyfill( 'scripts/vendor/respond.min.js', [ 'ie6', 'ie7', 'ie8' ] );";
    
    	$siteUrl = "var siteUrl = '" . Yii::$app->homeUrl . "';
					var fileUploadUrl = '" . Yii::$app->homeUrl . "apix/file/file-handler';";

		$view->registerJs( $inlineScript, View::POS_READY );

		$view->registerJs( $siteUrl, View::POS_END );
	}
}

?>