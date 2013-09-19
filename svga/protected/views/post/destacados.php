<h1 class="clear">Destacados</h1>

<div class="featured-covers">
	<div class="featured-covers-inner">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_destacadosview',
));
?>
	</div>
</div>
<hr>