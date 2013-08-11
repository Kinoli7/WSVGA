<?php
/**
 * @var $this SiteController
 * @var $formModel User
 */

$this->pageTitle = Yii::t('engrescat', 'Registre');

?>

<h1><?= Yii::t('engrescat', 'Formulari de registre'); ?></h1>

<p><?= Yii::t('engrescat', 'Si us plau, emplena el següent formulari per registrar-te al portal'); ?></p>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation' => true
)); ?>
 
	<fieldset>
		<?php echo $form->textFieldRow($formModel, 'name'); ?>
		<?php echo $form->textFieldRow($formModel, 'email'); ?>
		<?php echo $form->passwordFieldRow($formModel, 'password'); ?>
		<?php echo $form->passwordFieldRow($formModel, 'password_repeat'); ?>
		<?php echo $form->checkboxRow($formModel, 'subscribed'); ?>
	</fieldset>
	<div class="form-actions">
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
	</div>
 
		<?php $this->endWidget(); ?>
