<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Error";
?>
<?php if ( Yii::$app->user->isGuest ) { ?>
	<section class="module module-basic" id="module-public">
		<div class="bkg"></div>
		<div class="texture texture1"></div>
		<div class="wrap-content valign-center">
			<div class="header">
				<h1 class="align-middle">ERROR</h1>
			</div>
			<div class="content">
				<p> <?= nl2br(Html::encode($message)) ?> </p>
			</div>
		</div>
	</section>
<?php } else { ?>
	<h1 class="align-middle">ERROR</h1>

	<p> <?= nl2br(Html::encode($message)) ?> </p>
<?php } ?>