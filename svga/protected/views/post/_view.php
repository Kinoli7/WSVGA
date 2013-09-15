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
			<!-- <?php echo implode(', ', $data->userLinks); ?> CREA LINKS USUARIS
				<img src="<?php echo $data->image; ?>"/> <br /> INTENT IMATGES
				<?php echo $data->author->username . ', ' . date('F j, Y',$data->create_time); ?> <br /> 
			-->

			<i class="icon-pencil"></i>Autor: <b><?php echo $data->author->username ?></b>
			<i class="icon-calendar"></i><?= Yii::app()->dateFormatter->formatDateTime($data->create_time, 'long', 'short')?> <br />
			<div class="clear"><?php if($data->image != NULL and $data->image != 'blanks') echo CHtml::image(Yii::app()->baseUrl . '/images/' . $data->image)?></div>
			
			<?php echo $data->description;?>
		</div>
	<!-- <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b> -->

	<br />

	
	
	<div class="nav">
		<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	
		<?php $temporal = $data->status;
		if($temporal ==1)
			echo 'Borrador  ||'; 
		if($temporal ==2)
			 echo 'Publicada<i class="icon-eye-open"></i> || '; 
		if($temporal ==3)
			echo 'Archivada ||';?>

		<b>Tags:</b>
		<div class="icon-tag"></div><?php echo implode(', <div class="icon-tag"></div>', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('Permalink', $data->url); ?> <div class="icon-globe"></div> |
		<?php echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?> <div class="icon-comment"></div> |
		Last updated on <?php echo date('F j, Y',$data->update_time); ?> <div class="icon-time"></div>
		<div class="pull-right btn"><b>	<?php echo CHtml::link(CHtml::encode('Leer más'), array('view', 'id'=>$data->id)); ?></b></div>
	</div>
</div>