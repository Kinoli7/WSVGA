<ul>
	<li><?php echo CHtml::link('Crear Post',array('post/create')); ?></li>
	<li><?php echo CHtml::link('Gestionar Posts',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('Aprobar Commentarios',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>