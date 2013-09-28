<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array(
		        'class'=>'log-page',
		    ),
)); ?>
	<h2>Registrate en SVGA</h2>
	<p class="note">Los campos con <span class="required">*</span> son requsitos indispensables</p>



		<?php echo $form->labelEx($model,'Nombre de usuario:'); ?>
		<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username', array("class"=>"alert alert-error")); ?>



		<?php echo $form->labelEx($model,'Contraseña:'); ?>
		<div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'password', array("class"=>"alert alert-error")); ?>


		<?php echo $form->labelEx($model,'E-mail:'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email', array("class"=>"alert alert-error")); ?>



		<?php echo $form->labelEx($model,'Información de perfil:'); ?>
		<?php echo $form->textArea($model,'profile',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'profile', array("class"=>"alert alert-error")); ?>
	

	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save', array("class"=>"btn btn-info")); ?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>