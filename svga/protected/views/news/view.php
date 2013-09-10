<?php 


$this->pageTitle = CHtml::encode($new->{'title_' . Yii::app()->language});

$this->breadcrumbs=array(
	Yii::t('engrescat', 'Notícies') => $this->createUrl('news/index'),
	$new->{'title_' . Yii::app()->language}
);

?>

<div class="blog margin-bottom-30">
	<h3><?= CHtml::encode($new->{'title_' . Yii::app()->language}); ?></h3>
	<ul class="unstyled inline blog-info">
    	<li><i class="icon-calendar"></i> <?= Yii::app()->dateFormatter->formatDateTime($new->created, 'long', 'short')?></li>
    	<li><i class="icon-pencil"></i>AC Telecogresca</li>
    </ul>
    <?= $new->{'body_' . Yii::app()->language} ?>
</div>
<?php if(Yii::app()->user->checkAccess('admin')) { ?>
	<p><small><?= CHtml::link(Yii::t('engrescat', 'Edita'), $this->createUrl('news/edit', array('slug' => $new->slug))) ?></small></p>
<?php } ?>