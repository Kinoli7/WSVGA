<?php
$this->breadcrumbs=array(
	'Movieimages',
);

$this->menu=array(
	array('label'=>'Create Movieimage', 'url'=>array('create')),
	array('label'=>'Manage Movieimage', 'url'=>array('admin')),
);
?>

<h1>Movieimages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
