<?php
/* @var $this SiteController 
 * @var $formModel ForgetForm
 * */
$this->pageTitle = Yii::t('engrescat', 'Recuperació de la contrasenya');

$this->breadcrumbs=array(
	Yii::t('engrescat', 'Recuperació de la contrasenya'),
);

?>

<p><?= Yii::t('engrescat',"Si no recordes la teva contrasenya, introdueix el teu correu electrònic i t'enviarem un correu amb les instrucions que has de seguir per recuperar la contrasenya") ?></p>


<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation' => true
)); ?>
 
 	<fieldset>
		<?php echo $form->textFieldRow($formModel, 'email'); ?>
		
		<div class="control-group">
			<div class="controls">
	   			<?php $this->widget('CCaptcha'); ?>
	   		</div>
		</div>
	   
	   	<?php echo $form->textFieldRow($formModel, 'captcha'); ?>
	</fieldset>
	
	<div class="control-group">
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=> Yii::t('engresca', 'Envia'))); ?>
		</div>
	</div>
 
<?php $this->endWidget(); ?>