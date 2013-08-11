<h3><?= CHtml::link(CHtml::encode($data->{'title_' . Yii::app()->language}), Yii::app()->createUrl('news/view', array('slug' => $data->slug))); ?></h3>
<p><small><?= Yii::app()->dateFormatter->formatDateTime($data->created, 'long', 'short')?></small></p>
<hr />
<div class="noticia">
	<?= $data->{'body_' . Yii::app()->language} ?>
</div>