<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Reset Password";
?>
<section class="module module-basic" id="module-public">
	<div class="bkg"></div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="header">
			<h1 class="align-middle">RESET PASSWORD</h1>
		</div>
		<div class="content">
	    	<?php if( Yii::$app->session->hasFlash( "message" ) ) { ?>
				<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "message" ); ?> </p></div>
			<?php		
				}
				else {
	
	        		$form = ActiveForm::begin( [ 'id' => 'frm-reset-password' ] ); 
	        ?>
	        		<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'password' )->passwordInput( [ 'placeholder' => 'Password*' ] )->label( false ) ?>
		        	<?= $form->field( $model, 'password_repeat' )->passwordInput( [ 'placeholder' => 'Repeat Password*' ] )->label( false ) ?>
	
					<input type="submit" value="Reset" />
	        <?php 
	        		ActiveForm::end();
				}
			?>
		</div>
	</div>
</section>