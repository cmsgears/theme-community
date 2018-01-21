<?php
use themes\basic\assets\PublicAssetBundle;

PublicAssetBundle::register( $this );

// Variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>">
    <head>
		<?php include dirname( __DIR__ ) . "/headers/main.php"; ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
		<div id='pre-loader-page' class="max-area-cover"><div class="valign-center fa fa-5x fa-spinner fa-spin"></div></div>
		<?php include dirname( __DIR__ ) . "/headers/common.php"; ?>
        <div class="container-main">
	        <div class="wrap-content">
	        	<?= $content ?>
	        </div>
	        <?php include dirname( __DIR__ ) . "/footers/common.php"; ?>
        </div>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>