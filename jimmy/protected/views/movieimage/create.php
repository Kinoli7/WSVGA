<?php
$this->breadcrumbs=array(
	'Movieimages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Movieimage', 'url'=>array('index')),
	array('label'=>'Manage Movieimage', 'url'=>array('admin')),
);
?>

<h1>Create Movieimage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>