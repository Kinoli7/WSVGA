<?php
$this->breadcrumbs=array(
	'Movieimages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Movieimage', 'url'=>array('index')),
	array('label'=>'Create Movieimage', 'url'=>array('create')),
	array('label'=>'Update Movieimage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Movieimage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Movieimage', 'url'=>array('admin')),
);
?>

<h1>View Movieimage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'path',
		'movie_id',
	),
)); ?>
