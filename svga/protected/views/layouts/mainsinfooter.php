<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca_ES" lang="ca_ES">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/css/style.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/bootstrap/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/css/style_responsive.css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" />
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/fancybox/source/jquery.fancybox.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/css/effects.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/flexslider/flexslider.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/glyphicons/css/glyphicons.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/css/themes/default.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/unify/css/headers/header1.css" />
    <!--<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/assets/unify/css/headers/header1-red.css" />-->
    
    
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/unify/plugins/bootstrap/js/bootstrap.min.js"></script> 
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    // 'brand'=>CHtml::image(Yii::app()->getBaseUrl().'/images/logo.jpg'),
    'items'=>array(
    	
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                // array('label'=>'Home', 'url'=> $this->createUrl('site/index')),
                array('label'=>'Inicio', 'url'=> $this->createUrl('post/index')),
                array('label'=>'Galería de Imagenes', 'url'=> $this->createUrl('image/index')),
                array('label'=>'Contacto', 'url'=> $this->createUrl('site/contact')),
                // array('label'=>'Login', 'url'=> $this->createUrl('user/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=> $this->createUrl('site/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                // array('label'=>'Logout ('. Yii::app()->user->getState('name') .')', 'url'=>$this->createUrl('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
        
        '<form class="navbar-search pull-right">
                <input type="text" class="search-query span3" placeholder="Search">
                <div class="icon-search"></div>
            </form>',
        // CHtml::image(Yii::app()->getBaseUrl().'/images/logo.jpg'),	LOGO DRETA
          
    ),

)); ?>

<div class="container" id="page">
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => Chtml::link(Yii::t('SVGA', 'Inicio'), $this->createUrl('post/index'))
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, 
        'fade'=>true, 
        'closeText'=>'&times;', 
	)); ?>

	<?php echo $content; ?>
