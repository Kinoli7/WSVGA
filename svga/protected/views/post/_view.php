<?php
/* @var $this PostController */
/* @var $data Post */
?>



<div class="text-left">

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br /> -->

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>	 -->
	<h2><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h2>
		<div class="text-left">		
			<!-- <?php echo implode(', ', $data->userLinks); ?> CREA LINKS USUARIS-->
			<!-- <img src="<?php echo $data->image; ?>"/> <br /> INTENT IMATGES-->
			<!-- <?php echo $data->author->username . ', ' . date('F j, Y',$data->create_time); ?> <br /> -->
			<i class="icon-pencil"></i>Autor: <b><?php echo $data->author->username ?></b>
			<i class="icon-calendar"></i><?= Yii::app()->dateFormatter->formatDateTime($data->create_time, 'long', 'short')?> <br />
			<div class="clear"><?php if($data->image != NULl) echo CHtml::image(Yii::app()->baseUrl . '/images/' . $data->image)?></div>
			
			<?php echo CHtml::encode($data->description); ?>
		</div>
	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b> -->

	<br />

	
	
	<div class="nav">
		<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	
		<?php $temporal = $data->status;
		if($temporal ==1)
			echo CHtml::encode('Borrador  ||'); 
		if($temporal ==2)
			echo CHtml::encode('Publicada ||'); 
		if($temporal ==3)
			echo CHtml::encode('Archivada ||');?>

		<b>Tags:</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> |
		Last updated on <?php echo date('F j, Y',$data->update_time); ?>
		<div class="pull-right btn"><b>	<?php echo CHtml::link(CHtml::encode('Leer más'), array('view', 'id'=>$data->id)); ?></b></div>
	</div>
</div>