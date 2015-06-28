<?php
use \Yii;
use yii\helpers\Html;

use cmsgears\widgets\nav\BasicNav;

$publicMenuItems = [
	    [ 'label' => 'Home', 'url' => ['/'] ],
	    [ 'label' => 'Contact', 'url' => ['/contact'] ],
	    [ 'label' => 'Login', 'url' => ['/login'] ],
	    [ 'label' => 'Register', 'url' => ['/register'] ]
	];

$privateMenuItems = [
	    [ 'label' => 'Home', 'url' => ['/user/home'] ],
	    [ 'label' => 'Settings', 'url' => ['#'], 'options' => [ 'id' => 'btn-settings' ] ]
	];

$privateMenuItemsMobile = [
	    [ 'label' => 'Home', 'url' => ['/user/home'] ],
	    [ 'label' => 'Settings', 'url' => ['#'], 'options' => [ 'id' => 'btn-settings-mobile' ] ]
	];

$settingsMenuItems = [
	    [ 'label' => 'Profile', 'url' => ['/user/profile'] ],
	    [ 'label' => 'Logout', 'url' => ['/logout'] ]
	];
?>
<?php if ( Yii::$app->user->isGuest ) { ?>
	<!-- Public Header -->
	<header id="header" class="header-main">
		<div class="header-desktop clearfix">
			<div class="colf12x4">
				<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
			</div>
			<div class="colf12x8">
			<?php	
	            echo BasicNav::widget([
	                'options' => [ 'class' => 'nav-main' ],
	                'items' => $publicMenuItems
	            ]);
			?>
			</div>
		</div>
		<div class="header-mobile clearfix">
			<div id="btn-mobile-menu"> 
				<span class="fa fa-3x fa-list"></span>
			</div>
			<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/' ], null )?>
			<?php	
	            echo BasicNav::widget([
	                'options' => [ 'class' => 'nav-main', 'id' => 'nav-mobile' ],
	                'items' => $publicMenuItems
	            ]);
			?>
		</div>
	</header>
<?php } else { ?>
	<!-- Private Header -->
	<header id="header" class="header-main">
		<div class="header-desktop clearfix">
			<div class="colf12x4">
				<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/user/home' ], null )?>
			</div>
			<div class="colf12x8">
			<?php	
	            echo BasicNav::widget([
	                'options' => [ 'class' => 'nav-main' ],
	                'items' => $privateMenuItems
	            ]);
			?>
			</div>
		</div>
		<div class="header-mobile clearfix">
			<div id="btn-mobile-menu"> 
				<span class="fa fa-3x fa-list"></span>
			</div>
			<?=Html::a( "<img class='logo' src='" . Yii::getAlias( '@images' ) . "/logo.png'>", [ '/user/home' ], null )?>
			<?php	
	            echo BasicNav::widget([
	                'options' => [ 'class' => 'nav-main', 'id' => 'nav-mobile' ],
	                'items' => $privateMenuItemsMobile
	            ]);
			?>
		</div>
		<div id="box-settings" class='popout-header'>
			<?php	
	            echo BasicNav::widget([
	                'options' => [ 'class' => 'nav-settings' ],
	                'items' => $settingsMenuItems
	            ]);
			?>
		</div>
	</header>
<?php } ?>