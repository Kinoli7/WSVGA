
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation' => true
)); ?>
 
 		<fieldset>
	<?php echo $form->textFieldRow($formModel, 'email'); ?>
	<?php echo $form->passwordFieldRow($formModel, 'password'); ?>
</fieldset>
<div class="control-group">
	<div class="controls">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
	</div>
</div>
 
		<?php $this->endWidget(); ?>
		<?= CHtml::link(Yii::t('engrescat', "No recordes el password?"), $this->createUrl('user/forgot')); ?>


