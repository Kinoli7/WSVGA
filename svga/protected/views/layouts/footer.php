<div class="footer">
		<span class= "pull-left"> Copyright &copy; <?php echo date('Y'); ?> by SVGA. || All Rights Reserved.</span>
		<span class="pull-right">

			<?= CHtml::link(Yii::t('SVGA', 'Home'), $this->createUrl('post/index'))?> |
			<?= CHtml::link(Yii::t('SVGA', 'Contacte'), $this->createUrl('site/contact'))?> |
			<?= CHtml::link(Yii::t('SVGA', 'Política de privacitat'), $this->createUrl('site/privacy'))?> |
			<?= CHtml::link(Yii::t('dSVGA', 'Quant a aquest web'), $this->createUrl('site/about'))?>
		</span>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>