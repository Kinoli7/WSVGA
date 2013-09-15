<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>true,

)); ?>

	<p class="note">Todos los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->labelEx($model,'Titulo:'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>

		<?php echo $form->labelEx($model,'Nombre de la imagen:'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'image'); ?>


		<?php echo $form->labelEx($model,'Descripción (resumen):'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	

		<?php echo $form->labelEx($model,'Contenido (notícias):'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?>
	

		<?php echo $form->labelEx($model,'tags:'); ?>
		<?php echo $form->textField($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	
	<div class="row">
		<?php echo ('Guardar como:'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

	<script>
	
	$(document).ready(function() {
		
		$('#News_title_ca').slug({'slug': 'News_slug'});
		
		tinymce.init({
			selector: "textarea",
			plugins: "textcolor pagebreak table link image emoticons preview",
			pagebreak_separator: "<!-- mes -->",
			menubar: 'edit insert format',
			toolbar: 'undo redo | styleselect forecolor backcolor| bold italic | link image  | pagebreak table hr | emoticons preview',
		});
		
	});
	
</script>


</div>

<?php $this->endWidget(); ?>



</div><!-- form -->