<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home',
);

$this->menu=array(
	array('label'=>'Crear Post', 'url'=>array('create')),
	array('label'=>'Gestionar Post', 'url'=>array('admin')),
);
?>
<div class="container">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider2,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
          'title',
          'create_time'=>'Fecha',
      ),
));
?>
</div>

