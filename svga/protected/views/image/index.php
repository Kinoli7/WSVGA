<?php
/* @var $this ImageController */

$this->breadcrumbs=array(
	'Galería de Imagenes',
);
?>
<head>
  </head>

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

      $filepath = '/home/xexu/yii/gallery/';
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




<!-- ACABA MINIATURAS IMAGEN PARA NOTICIAS -->