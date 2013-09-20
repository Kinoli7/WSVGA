<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home',
);

$this->menu=array(
	array('label'=>'Crear Post', 'url'=>array('create')),
	array('label'=>'Gestionar Post', 'url'=>array('admin')),
);
?>
<div class="container">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider2,
	'itemView'=>'_view',
	'sortableAttributes'=>array(
          'title',
          'create_time'=>'Fecha',
      ),
));
?>
</div>

	<div class="copyright">
        <div class="container">
            <div class="row-fluid">
        		<div class= "span7"><p>Copyright &copy; <?php echo date('Y'); ?> by SVGA. || All Rights Reserved.</p></div>
        		<div class="span5">
        			<?= CHtml::link(Yii::t('SVGA', 'Home'), $this->createUrl('post/index'))?> |
        			<?= CHtml::link(Yii::t('SVGA', 'Contacte'), $this->createUrl('site/contact'))?> |
        			<?= CHtml::link(Yii::t('SVGA', 'Política de privacitat'), $this->createUrl('site/privacy'))?> |
        			<?= CHtml::link(Yii::t('dSVGA', 'Quant a aquest web'), $this->createUrl('site/about'))?>
	          </div>
           </div><!-- footer -->
       </div>
   </div>

