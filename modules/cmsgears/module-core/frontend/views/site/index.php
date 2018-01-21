<?php
// Yii Imports
use yii\captcha\Captcha;

// Gallery
use cmsgears\widgets\gallery\Gallery;

$coreProperties 		= $this->context->getCoreProperties();
$this->title 			= $coreProperties->getSiteTitle();
$this->params['desc']	= "The basic template with basic theme for CMSGears.";
$this->params['meta']	= "cmsgears, template, basic, theme";
?>
<section class="module module-basic" id="module-banner">
	<div class="bkg-parallax"> </div>
	<div class="texture texture1"></div>
	<div class="wrap-content valign-center">
		<div class="content">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do....
		</div>
	</div>
</section>

<section class="module module-basic" id="module-about">
<?php
    echo Gallery::widget([
        'options' => [ 'id' => 'portfolio-main', 'class' => 'gallery-basic portfolio clearfix' ],
        'galleryName' => 'main',
        'view' => 'portfolio'
    ]);
?>
</section>

<section class="module module-basic" id="module-contact">
	<div class="bkg"> </div>
	<div class="wrap-content valign-center">
		<h2 class="header">Write To Us</h2>
		<div class="content clearfix">
			<div class="col3x2 clearfix">
				<form class="frm-ajax" id="frm-contact" action="<?php echo Yii::$app->urlManager->createAbsoluteUrl("apix/contact"); ?>" method="post">
					<div class="max-area-cover spinner"><div class="valign-center fa fa-3x fa-spinner fa-spin"></div></div>
					<div class="row clearfix">
						<div class="col2">
							<div class="frm-icon-field">
								<span class="wrap-icon fa fa-user"></span><input type="text" name="Contact[name]" placeholder="Name *">
							</div>
							<span class="error" cmt-error="name"></span>
						</div>
						<div class="col2">
							<div class="frm-icon-field">
								<span class="wrap-icon fa fa-at"></span><input class="fa-field-email" type="text" name="Contact[email]" placeholder="Email *">
							</div>
							<span class="error" cmt-error="email"></span>
						</div>
					</div>
					<div class="row clearfix">
						<div class="frm-icon-field">
							<span class="wrap-icon fa fa-briefcase"></span><input type="text" name="Contact[subject]" placeholder="Subject *">
						</div>
						<span class="error" cmt-error="subject"></span>
					</div>
					<div class="row clearfix">
						<div class="frm-icon-field">
							<span class="wrap-icon fa fa-folder icon-textarea"></span><textarea name="Contact[message]" placeholder="Message *"></textarea>
						</div>	
						<span class="error" cmt-error="message"></span>
					</div>
					<div class="row clearfix">
						<?= Captcha::widget( [ 'name' => 'Contact[captcha]', 'captchaAction' =>  '/cmgforms/site/captcha' ] ); ?>	
						<span class="error" cmt-error="captcha"></span>
					</div>
					<div class="row clearfix">
						<input type="submit" name="submit" value="Submit">
					</div>
					<div class="row clearfix">
						<div class="message warning"></div>
					</div>	
				</form>
			</div>
			<div class="col3">
				<h6>Address</h6>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				</p>
			</div>
		</div>
	</div>
</section>