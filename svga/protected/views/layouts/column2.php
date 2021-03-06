<?php $this->beginContent('/layouts/main'); ?>
	<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<div id="sidebar">
				<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>

				<?php $this->widget('TagCloud', array(
					'maxTags'=>Yii::app()->params['tagCloudCount'],
				)); ?>

				<?php $this->widget('RecentComments', array(
					'maxComments'=>Yii::app()->params['recentCommentCount'],
				)); ?>
				
			
			<h4>SÍGUENOS EN</h4>
				<ul style="list-style: none;">
					<img src="<?php echo Yii::app()->baseUrl; ?>/images/twitch.png"></img>
					<li><a href="http://www.twitch.tv/svgaupc" target="_blank"><img src="<?php echo Yii::app()->baseUrl; ?>/images/twitch.png"></img></a></li>
					<!-- <li><a href="https://twitter.com/Karont3_Club" target="_blank">TWITTER</a></li> -->
					<!-- <li><a href="http://www.youtube.com/karont3clubtarget" target="_blank">YOUTUBE</a> -->
					<li><a href="https://www.facebook.com/svgaupc" target="_blank">FACEBOOK</a></li>
				</ul>
			</div>
		</div>
		<div class="span10">
				<?php echo $content; ?>
				<?php $this->endContent(); ?>
		</div>
	</div>
</div>
