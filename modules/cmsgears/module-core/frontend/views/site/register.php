<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Register";
?>
<section class="module module-basic" id="module-public">
	<div class="bkg"></div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="header">
			<h1 class="align-middle">REGISTER</h1>
		</div>
		<div class="content">
	    	<?php if( Yii::$app->session->hasFlash( "success" ) ) { ?>
				<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "success" ); ?> </p></div>
			<?php
				}
				else {
	
	        		$form 	= ActiveForm::begin( ['id' => 'frm-registration' ] ); 
					$terms	= "I agree to the " . Html::a( "Terms", [ '/terms' ], null ) . " and " . Html::a( "Privacy Policy", [ '/privacy' ], null ) . ".";
	        ?>
		        	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'password' )->passwordInput( [ 'placeholder' => 'Password*' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'password_repeat' )->passwordInput([ 'placeholder' => 'Confirm Password*' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'username' )->textInput( [ 'placeholder' => 'Username' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'firstName' )->textInput( [ 'placeholder' => 'First Name' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'lastName' )->textInput( [ 'placeholder' => 'Last Name' ] )->label( false ) ?>
					<?= $form->field( $model, 'newsletter' )->checkbox() ?>

					<input type="submit" value="Register" />
	        <?php 
	        		ActiveForm::end();
				}
			?>
		</div>
	</div>
</section>