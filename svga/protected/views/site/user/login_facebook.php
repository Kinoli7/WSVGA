<p><?= Yii::t('engrescat', 'Inicia sessió usant el Facebook') ?></p>

<p class="text-center"><?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=> Yii::t('engrescat', "Facebook Login"),
	'type'=>'primary',
	'size'=>'large',
)); ?></p>	