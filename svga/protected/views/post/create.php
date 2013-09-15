<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	'Crear Post',
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/tinymce/tinymce.min.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.slug.js');

$this->PageTitle = "SVGA - Crear Post";
$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>


<h1>Crear Post</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>