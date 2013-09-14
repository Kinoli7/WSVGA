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

<div class="container"><h1>Bienvenido a la página web de SVGA</h1></div>
<!-- 	<h2>Noticias</h2> -->


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>




