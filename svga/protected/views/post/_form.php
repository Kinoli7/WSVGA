<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>true,

));

 ?>

	<p class="note">Todos los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model,null,null,array("class"=>"alert alert-error")); ?>

		<?php echo $form->error($model,'title',array("class"=>"alert alert-error")); ?>
		<?php echo $form->labelEx($model,'Titulo:'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		
		<br />

		<?php echo $form->error($model,'image',array("class"=>"alert alert-error")); ?>
		<?php echo $form->labelEx($model,'Nombre de la imagen:'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>128)); ?>
		
		<br />

		<?php echo $form->error($model,'description',array("class"=>"alert alert-error")); ?>
		<?php echo $form->labelEx($model,'Descripción (resumen):'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		
		<br />

		<?php echo $form->error($model,'content', array("class"=>"alert alert-error")); ?>
		<?php echo $form->labelEx($model,'Contenido (notícias):'); ?>
		<?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		
		<br />

		<?php echo $form->error($model,'tags', array("class"=>"alert alert-error")); ?>
		<?php echo $form->labelEx($model,'tags:'); ?>
		<?php echo $form->textField($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		
	
	<div class="clear">
		<?php echo ('Guardar como:'); ?>
		<?php echo $form->dropDownList($model,'status',Lookup::items('PostStatus')); ?>
		<div class="pull-right"><?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?></div>
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