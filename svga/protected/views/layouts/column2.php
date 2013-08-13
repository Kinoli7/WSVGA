<?php $this->beginContent('/layouts/main'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div id="sidebar">
				<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

				<?php $this->widget('TagCloud', array(
					'maxTags'=>Yii::app()->params['tagCloudCount'],
				)); ?>

				<?php $this->widget('RecentComments', array(
					'maxComments'=>Yii::app()->params['recentCommentCount'],
				)); ?>
			</div><!-- sidebar -->
		</div>
		<div class="span9">
			<div id="content">
				<?php echo $content; ?>
				<?php $this->endContent(); ?>
			</div><!-- content -->
		</div>
	</div>
</div>
