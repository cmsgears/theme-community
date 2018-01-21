<?php
use yii\helpers\Html;
use cmsgears\widgets\login\AjaxLogin;
?>
<header id="header" class="header-main">
	<div class="header-desktop clearfix">
		<div class="colf12x4">
			<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
		</div>
		<div class="colf12x6">
			<ul class="nav-main">
	            <li><a class="smooth-scroll" href="#module-banner">Home</a></li>
	            <li><a class="smooth-scroll" href="#module-about">About</a></li>
	            <li><a class="smooth-scroll" href="#module-contact">Contact</a></li>
			</ul>
		</div>
		<div class="colf12x2">
			<span class="btn" id="btn-login">My Account</span>
		</div>
	</div>
	<div class="header-mobile clearfix">
		<div id="btn-mobile-menu"> 
			<span class="fa fa-3x fa-list"></span>
		</div>
		<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
		<span class="fa fa-3x fa-user" id="btn-login-mobile"></span>
		<ul class="nav-main" id='nav-mobile'>
            <li><a class="smooth-scroll" href="#module-banner">Home</a></li>
	        <li><a class="smooth-scroll" href="#module-about">About</a></li>
			<li><a class="smooth-scroll" href="#module-contact">Contact</a></li>
		</ul>
	</div>
	<?=AjaxLogin::widget( [ 'options' => [ 'id' => 'wrap-login-register' ] ] )?>
</header>