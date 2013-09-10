<?php
/* @var $this SiteController 
 * @var $formModel LoginForm
 * */

$this->pageTitle = Yii::t('SVGA', 'Inicia sessió');

$this->breadcrumbs=array(
	Yii::t('SVGA', 'Inicia sessió'),
);

$tabs = array(

	array(
		'active' => 1,
		'label' => Yii::t('SVGA', 'Usuari i password'),
		'content' => $this->renderPartial('login_form', array('formModel' => $formModel), true)
	),
	array(
		'active' => 0,
		'label' => 'Facebook',
		'content' => $this->renderPartial('login_facebook', null, true)
	),
	array(
		'active' => 0,
		'label' => Yii::t('SVGA', 'Membres Telecogresca'),
		'content' => $this->renderPartial('login_kapos', null, true)
	)

);

?>

<h1><?= Yii::t('SVGA', 'Inicia sessió') ?></h1>

<div class="row">
	
	<div class="span5">
		<?php $this->widget('bootstrap.widgets.TbTabs', array(
    		'tabs'=> $tabs
		)); ?>
	</div>
	
	<div class="span4">
		<p><?= Yii::t('SVGA', "Per tal d'accedir a tots els serveis que ofereix el portal, has d'estar registrat")?></p>
		<p><?= Yii::t('SVGA', "El registre és gratuït i no tardaràs més d'1 minut.")?></p>
		<p class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=> Yii::t('SVGA', "Registra't"),
    		'type'=>'success',
    		'size'=>'large',
    		'url' => $this->createUrl('user/register'),
		)); ?></p>	
		<p>També pots registrar-te a través de Facebook</p>
		<p class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=> Yii::t('SVGA', "Facebook Login"),
    		'type'=>'primary',
    		'size'=>'large',
		)); ?></p>		
	</div>

</div>
