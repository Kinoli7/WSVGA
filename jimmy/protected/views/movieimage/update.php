<?php
$this->breadcrumbs=array(
	'Movieimages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Movieimage', 'url'=>array('index')),
	array('label'=>'Create Movieimage', 'url'=>array('create')),
	array('label'=>'View Movieimage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Movieimage', 'url'=>array('admin')),
);
?>

<h1>Update Movieimage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>