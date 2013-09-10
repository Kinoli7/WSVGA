<?php
//comprovem si tenim el <!-- mes --> per tallar
$count = strpos($data->{'body_' . Yii::app()->language}, '<!-- mes -->');
if($count === false) {
	$content = $data->{'body_' . Yii::app()->language};
} else {
	$content = substr($data->{'body_' . Yii::app()->language}, 0, $count);
}

?>

<div class="blog margin-bottom-30">
	<h3><?= CHtml::encode($data->{'title_' . Yii::app()->language}); ?></h3>
	<ul class="unstyled inline blog-info">
    	<li><i class="icon-calendar"></i> <?= Yii::app()->dateFormatter->formatDateTime($data->created, 'long', 'short')?></li>
    	<li><i class="icon-pencil"></i>AC Telecogresca</li>
    </ul>
    <?= $content ?>
    <p><a class="btn-u btn-u-small" href="<?= Yii::app()->createUrl('news/view', array('slug' => $data->slug)) ?>"><?= Yii::t('engrescat', 'Segueix llegint') ?></a></p>
</div>