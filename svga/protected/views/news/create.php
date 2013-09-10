<?php 

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/tinymce/tinymce.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.slug.js');

$this->pageTitle = Yii::t('engrescat', 'Editor de notícies');

$this->breadcrumbs=array(
	Yii::t('engrescat', 'Notícies') => $this->createUrl('news/index'),
	Yii::t('engrescat', 'Editor')
);

?>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'type'=>'horizontal',
	'enableClientValidation' => true
)); ?>
 
 	<fieldset>
		<?php echo $form->textFieldRow($formModel, 'title_ca'); ?>
		<?php echo $form->textFieldRow($formModel, 'title_es'); ?>
		<?php echo $form->textAreaRow($formModel, 'body_ca'); ?>
		<?php echo $form->textAreaRow($formModel, 'body_es'); ?>
		<?php echo $form->textFieldRow($formModel, 'slug'); ?>
	</fieldset>
<div class="control-group">
	<div class="controls">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=> Yii::t('engrescat', 'Guardar'))); ?>
	</div>
</div>
 
		<?php $this->endWidget(); ?>

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
