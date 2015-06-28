<?php
use \Yii;
use yii\helpers\Html;
?>
<meta charset="<?= $coreProperties->getCharset() ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php if( isset( $this->params['desc'] ) ) { ?>
	<meta name="description" content="<?=$this->params['desc']?>">
<?php } ?>
<?php if( isset( $this->params['meta'] ) ) { ?>
	<meta name="keywords" content="<?=$this->params['meta']?>">
<?php } ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<?= Html::csrfMetaTags() ?>

<title><?= $this->title ?></title>

<!-- IE fix for console -->
<script type="text/javascript"> if ( !window.console ) console = { log: function() {} }; </script>

<!-- Browser tab icons -->
<link href="images/icons/icon.ico" rel="shortcut icon">
<link href="images/icons/icon.jpg" rel="apple-touch-icon-precomposed">

<?php $this->head(); ?>