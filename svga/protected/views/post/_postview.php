<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="text-left">
	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br /> -->

	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>	 -->
	<h3><?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id)); ?></h3>
	<div class="row">
		<div class="text-left">		
			<!-- <?php echo implode(', ', $data->userLinks); ?> CREA LINKS USUARIS-->
			<!-- <img src="<?php echo $data->image; ?>"/> <br /> INTENT IMATGES-->
			<!-- <?php echo $data->author->username . ', ' . date('F j, Y',$data->create_time); ?> <br /> -->
			<i class="icon-pencil"></i>Autor: <b><?php echo $data->author->username ?></b>
			<i class="icon-calendar"></i><?= Yii::app()->dateFormatter->formatDateTime($data->create_time, 'long', 'short')?> <br />
			
				<div class="span2"><?php if($data->image != NULl) echo CHtml::image(Yii::app()->baseUrl . $data->image)?></div>
				<div class="span9"><br/><?php echo CHtml::encode($data->content); ?>
		</div>
	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b> -->
	<br />
	</div>
</div>

	
	
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
		Last updated on <?php echo date('F j, Y',$data->update_time); ?>
		<div class="pull-right btn"><b>	<?php echo CHtml::link(CHtml::encode('Leer más'), array('view', 'id'=>$data->id)); ?></b></div>
	</div>
</div>
