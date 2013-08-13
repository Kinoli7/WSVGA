<?php
/* @var $this CommentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>'Create Comment', 'url'=>array('create')),
	array('label'=>'Manage Comment', 'url'=>array('admin')),
);
?>

<h1>Comments</h1>

<div class="text-left">
	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	)); ?>
</div>
