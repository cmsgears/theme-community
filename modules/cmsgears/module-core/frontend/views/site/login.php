<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Login";
?>
<section class="module module-basic" id="module-public">
	<div class="bkg"></div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="header">
			<h1 class="align-middle">LOGIN</h1>
		</div>
		<div class="content">
			<?php $form = ActiveForm::begin( [ 'id' => 'frm-login' ] );?>
	
	    	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'password' )->passwordInput( array( 'placeholder' => 'Password*' ) )->label( false ) ?>
	    	<?= $form->field( $model, 'rememberMe' )->checkbox() ?>

			<?= Html::a( "Forgot your Password ?", [ '/forgot-password' ] ) ?>
			
			<div><input type="submit" value="Login" /></div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</section>