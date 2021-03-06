<?php
/* @var $this SiteController 
 * @var $formModel LoginForm
 * */

$this->pageTitle = Yii::t('SVGA', 'Inicia sesion');

$this->breadcrumbs=array(
	Yii::t('SVGA', 'Inicia sesion'),
);

$tabs = array(

	array(
		'active' => 1,
		'label' => Yii::t('SVGA', 'Usuario y contraseña'),
		'content' => $this->renderPartial('login_form', array('formModel' => $formModel), true)
	),
	array(
		'active' => 0,
		'label' => 'Facebook',
		'content' => $this->renderPartial('login_facebook', null, true)
	),
	array(
		'active' => 0,
		'label' => Yii::t('SVGA', 'Miembros SVGA'),
		'content' => $this->renderPartial('login_kapos', null, true)
	)

);

?>

<h1><?= Yii::t('SVGA', 'Inicia sesion') ?></h1>

<div class="row">
	
	<div class="span6">
		<?php $this->widget('bootstrap.widgets.TbTabs', array(
    		'tabs'=> $tabs
		)); ?>
	</div>
	
	<div class="span5">
		<p><?= Yii::t('SVGA', "Para acceder a todos los servicios que te ofrece este portal tienes que estar registrado.")?></p>
		<p><?= Yii::t('SVGA', "El registro es gratuito y no tardarás ḿás de un minuto.")?></p>
		<p class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=> Yii::t('SVGA', "Registra't"),
    		'type'=>'success',
    		'size'=>'large',
    		'url' => $this->createUrl('user/register'),
		)); ?></p>	
		<p>También puedes registrarte a través de Facebook</p>
		<p class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
		    'label'=> Yii::t('SVGA', "Facebook Login"),
    		'type'=>'primary',
    		'size'=>'large',
		)); ?></p>		
	</div>

</div>
