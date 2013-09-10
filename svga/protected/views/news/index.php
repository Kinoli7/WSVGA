<?php

$this->pageTitle = Yii::t('SVGA', 'Notícies');

$this->breadcrumbs=array(
	Yii::t('SVGA', 'Notícies'),
);
?>

<?php $this->widget('ext.news-widget.NewsWidget'); ?>