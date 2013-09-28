<?php foreach($comments as $comment): ?>
<div class="comment" id="c<?php echo $comment->id; ?>">

	<?php echo CHtml::link("#{$comment->id}", $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this comment',
	)); ?>

	<div class="author">
		<?php echo CHtml::link($comment->authorLink); ?> dijó:
	</div>

	<div class="time">
		<?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?>
	</div>

	<div class="content">
		<?php echo nl2br($comment->content); ?>
	</div>

</div><!-- comment -->
<hr>
<?php endforeach; ?>