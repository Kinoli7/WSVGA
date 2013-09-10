<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca_ES" lang="ca_ES">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ca_ES" />


    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    
    'items'=>array(
    	
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                // array('label'=>'Home', 'url'=> $this->createUrl('site/index')),
                array('label'=>'Inicio', 'url'=> $this->createUrl('post/index')),
                array('label'=>'Contacto', 'url'=> $this->createUrl('site/contact')),
                // array('label'=>'Login', 'url'=> $this->createUrl('user/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=> $this->createUrl('site/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'Login-test', 'url'=> $this->createUrl('user/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                // array('label'=>'Logout ('. Yii::app()->user->getState('name') .')', 'url'=>$this->createUrl('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
        //'brand'=>CHtml::image(Yii::app()->getBaseUrl().'/images/logo.jpg'),
        '<form class="navbar-search pull-right">
                <input type="text" class="search-query span3" placeholder="Search">
                <div class="icon-search"></div>
            </form>',
          
    ),

)); ?>

<div class="container" id="page">
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => Chtml::link(Yii::t('SVGA', 'Inici'), $this->createUrl('post/index'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, 
        'fade'=>true, 
        'closeText'=>'&times;', 
	)); ?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<br />
	<hr>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by SVGA. || All Rights Reserved.<br/>
		<span class="pull-right">
			<?= CHtml::link(Yii::t('SVGA', 'Home'), $this->createUrl('post/index'))?> |
			<?= CHtml::link(Yii::t('SVGA', 'Contacte'), $this->createUrl('site/contact'))?> |
			<?= CHtml::link(Yii::t('SVGA', 'Política de privacitat'), $this->createUrl('site/privacy'))?> |
			<?= CHtml::link(Yii::t('dSVGA', 'Quant a aquest web'), $this->createUrl('site/about'))?>
		</span>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
