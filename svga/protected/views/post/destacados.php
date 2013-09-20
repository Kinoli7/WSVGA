<?php 
$this->breadcrumbs=array(
	'Home',
);
$this->menu=array(
	array('label'=>'Crear Post', 'url'=>array('create')),
	array('label'=>'Gestionar Post', 'url'=>array('admin')),
);
?>
<h1 >Bienvenido a la página web de SVGA</h1>
<h2 class="text-center">Notícias destacadas</h2>

<div class="featured-covers">
	<div class="featured-covers-inner">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider1,
	'summaryText'=>'', 
	'itemView'=>'_destacadosview',
));
?>
	</div>
</div>
<hr>