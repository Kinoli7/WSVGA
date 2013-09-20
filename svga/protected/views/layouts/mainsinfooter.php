<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca_ES" lang="ca_ES">
<head>
<?php
	$baseUrl = Yii::app()->request->baseUrl;
	$clientScript = Yii::app()->getClientScript();
	$clientScript->registerMetaTag("text/html; charset=utf-8",null,"Content-Type");
	$clientScript->registerMetaTag("es","language");
	$clientScript->registerMetaTag("width=device-width, initial-scale=1.0","viewport");
	$clientScript->registerMetaTag("rios.nicolas@gmail.com","author");
	$clientScript->registerMetaTag("IE=edge",null,"X-UA-Compatible");

	$clientScript->registerLinkTag('shortcut icon', null, $baseUrl . '/images/logo.jpg');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ca_ES" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
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
                array('label'=>'Login-test', 'url'=> $this->createUrl('user/login'), 'visible'=> Yii::app()->user->isGuest),
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
