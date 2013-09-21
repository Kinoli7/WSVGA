<?php

$cs = Yii::app()->getClientScript();

$cs->registerScriptFile(Yii::app()->baseUrl . '/unify/js/modernizr.custom.js');
$cs->registerScriptFile(Yii::app()->baseUrl . '/unify/js/modernizr.js');
$cs->registerScriptFile(Yii::app()->baseUrl . '/unify/js/jquery.cslider.js');

$cs->registerCssFile(Yii::app()->baseUrl . '/unify/css/parallax-slider.css');

?>

<script>
	
	$(document).ready(function() {
		$('#da-slider').cslider({ bgincrement : 50});
	});
	
</script>

<div class="slider-inner">
    <div id="da-slider" class="da-slider">
        <div class="da-slide">
            <h2><i>Engresca't 2013</i> <br /> <i>Concurs de grups novells</i></h2>
            <p><i>El concurs que et</i> <br /> <i>pot dur a tocar a la</i> <br /> <i>Telecogresca! </i></p>
            <!--<div class="da-img"><img src="assets/plugins/parallax-slider/img/1.png" alt="" /></div>-->
        </div>
        <div class="da-slide">
            <h2><i>Bonobos</i> <br /> <i>guanyador</i> <br /> <i>Engrescat 2013</i></h2>
            <p><i>Va tocar en el festival</i> <br /> <i>musical universitari més emblemàtic</i> <br /><i>del principat</i></p>
            <div class="da-img">
				<iframe width="500" height="300" src="//www.youtube.com/embed/dvLulmg8WUk?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="da-slide">
            <h2><i>USING BEST WEB</i> <br /> <i>SOLUTIONS WITH</i> <br /> <i>HTML5/CSS3</i></h2>
            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
            <!--<div class="da-img"><img src="assets/plugins/parallax-slider/img/html5andcss3.png" alt="image01" /></div>-->
        </div>
        <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>		
        </nav>
    </div><!--/da-slider-->
</div>