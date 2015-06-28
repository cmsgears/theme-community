<?php
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Login";
?>
<section class="module module-basic" id="module-public">
	<div class="bkg"></div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="header">
			<h1 class="align-middle">CONTACT US</h1>
		</div>
		<div class="content">
	    	<?php if( Yii::$app->session->hasFlash( "success" ) ) { ?>
				<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "success" ); ?> </p></div>
			<?php
				}
				else {

	        		$form = ActiveForm::begin( [ 'id' => 'frm-contact' ] ); 
	        ?>

	            	<?= $form->field( $model, 'name' )->textInput( [ 'placeholder' => 'Name*' ] )->label( false ) ?>
	            	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>
	            	<?= $form->field( $model, 'subject' )->textInput( [ 'placeholder' => 'Subject*' ] )->label( false ) ?>
	            	<?= $form->field( $model, 'message' )->textArea( [ 'placeholder' => 'Message*', 'rows' => 6 ] )->label( false ) ?>

					<?= $form->field( $model, 'captcha' )->label( false )->widget( Captcha::classname(), [ 'options' => [ 'placeholder' => 'Captcha*' ] ] ) ?>

	            	<input type="submit" value="Send" />
			<?php
	        		ActiveForm::end();
				}
	        ?>
		</div>
	</div>
</section>