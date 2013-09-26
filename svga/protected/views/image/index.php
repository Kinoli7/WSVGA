<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	'Galería de Imagenes',
);
?>
<style>
.item0,.item1,.item2,.item3,.item4,.item5,.item6,.item7,.item8{float:left;}

.item1,.item0 {
    width:300px;
}
.item2 {
    width:300px;
}
.item3,.item8 {
    width:300px;
}
.item4,.item5,.item6,.item7{
    width:300px;
}

#container{
    float:left; width:1000px;
}
</style>
<h1>Galería de Imagenes</h1>

<!-- MINIATURAS IMAGEN PARA NOTICIAS -->
<div class="container">
  <div class="row-fluid">
    <div class="headline text-center"><h3>Recientes footer</h3></div>
    <ul class="thumbnails">
    <?php 
      $imgCssClass= 'thumbnail-style thumbnail-kenburn';
      $thumbCssClass= 'thumbnail-img';
      $overCssClass= 'overflow-hidden';
      $liCssClass= 'span3';

      foreach($filelist as $key => $value)
      {
        echo CHtml::openTag('li',array('class'=>$liCssClass))."\n";
        echo CHtml::openTag('div',array('class'=>$imgCssClass))."\n";
        echo CHtml::openTag('div',array('class'=>$thumbCssClass))."\n";
        echo CHtml::openTag('div',array('class'=>$overCssClass))."\n";
        echo CHtml::image(Yii::app()->getBaseUrl().'/gallery/' . $value);
        echo "<a class='btn-more hover-effect' href='#'>read more +</a>";     
        echo "</a></div></div></div></li>";
      }
      ?>
    </ul>
  </div>
</div>
<div class="container">
    <div class="headline text-center"><h3>Autordenado footer</h3></div>
    <div id="item">
    <?php 
      $i = 1;
      $id = 'image' . $i;
      foreach($filelist as $key => $value)
      {
        echo CHtml::openTag('div',array('class'=>'item' . $i))."\n";
        echo CHtml::image(Yii::app()->getBaseUrl().'/gallery/' . $value); 
        echo "</div>";
        $i++;
      }
      ?>
    </div>
</div>

<script src="/svga/js/jquery.masonry.min.js"></script>
<script type="text/javascript">
$(function(){
  $('#container').masonry({
     columnWidth : 500 
  isAnimated: !Modernizr.csstransitions
  }
  });
});
</script>
<!-- ACABA MINIATURAS IMAGEN PARA NOTICIAS -->