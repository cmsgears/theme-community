<?php
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Forgot Password";
?>
<section class="module module-basic" id="module-public">
	<div class="bkg"></div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="header">
			<h1 class="align-middle">FORGOT PASSWORD</h1>
		</div>
		<div class="content">
	    	<?php if( Yii::$app->session->hasFlash( "success" ) ) { ?>
				<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "success" ); ?> </p></div>
			<?php
				}
				else {

	        		$form = ActiveForm::begin( [ 'id' => 'frm-forgot-password' ] ); 
	        ?>
		        	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>

					<input type="submit" value="Submit" />
	        <?php 
	        		ActiveForm::end();
				}
			?>
		</div>
	</div>
</section>