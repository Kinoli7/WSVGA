<ul>
	<li>  <?php echo CHtml::link(' <i class="icon-plus-sign"></i> Crear Post',array('post/create')); ?></li>
	<li>  <?php echo CHtml::link(' <i class="icon-list"></i> Gestionar Posts',array('post/admin')); ?> </li></li>
	<li>  <?php echo CHtml::link(' <i class="icon-ok"></i> Aprobar Commentarios',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li> <?php echo CHtml::link('Ver usuarios',array('users/index')); ?></li>
	<li> <?php echo CHtml::link('Logout',array('site/logout')); ?></li>
</ul>