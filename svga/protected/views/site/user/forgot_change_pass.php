<?php
/* @var $this SiteController 
 * @var $formModel ForgetForm
 * */
$this->pageTitle = Yii::t('engrescat', 'Recuperació de la contrasenya');

$this->breadcrumbs=array(
	Yii::t('engrescat', 'Recuperació de la contrasenya'),
);

?>
<p><?= Yii::t('engrescat', 'Introdueix la nova contrasenya a continuació') ?></p>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation' => true
)); ?>
 
 	<fieldset>
		<?php echo $form->passwordFieldRow($formModel, 'password'); ?>
	   
	   	<?php echo $form->passwordFieldRow($formModel, 'password_repeat'); ?>
	</fieldset>
	
	<div class="control-group">
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=> Yii::t('engresca', 'Envia'))); ?>
		</div>
	</div>
 
<?php $this->endWidget(); ?>