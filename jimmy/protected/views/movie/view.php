		<div class="five columns">
<?php   
$id = $model->id;
$upload = new XUploadForm;
$this->widget('ext.xupload.XUploadWidget', array(
                    'url' => Yii::app()->createUrl("movie/upload/",
                    array("parent_id" =>$id ) ),
                    'model' => $upload,
                    'attribute' => 'file',
                    'options'=>array(
                    /*'beforeSend' => 'js:function(event, files, index, xhr, handler, callBack) {
                        handler.uploadRow.find(".upload_start button").click(callBack);
                    }',*/
                    'onComplete' => 'js:function (event, files, index, xhr, handler, callBack) {
                                                        $("#Movie_avatar").val(\'\'+handler.response.name + \'\' );
                                                        }'),
));
//
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movie-form',
	'enableAjaxValidation'=>false,
)); 
$this->endWidget();
?>
<?php
$this->breadcrumbs=array(
	'Movies'=>array('index'),
	$model->title,
);



$this->menu=array(
	array('label'=>'List Movie', 'url'=>array('index')),
	array('label'=>'Create Movie', 'url'=>array('create')),
	array('label'=>'Update Movie', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Movie', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Movie', 'url'=>array('admin')),
);
?>



	
<?php
  if( $images = Movieimage::model()->find('movie_id =:id',array(':id'=>$model->id)))
  {
   //CVardumper::dump($images);
   echo  CHtml::image(Yii::app()->request->baseUrl.'/images/movie/'.$model->id.'/'.$images->path); 
   echo "<br/>";
  }
?>
</div>  

<div class="seven columns">
<h2><?php echo $model->title; ?></h4>
<hr/>

<?php
  if( $images = Movieimage::model()->find('movie_id =:id',array(':id'=>$model->id)))
  {
  
   echo  CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->id.'/'.$images->path); 
   echo "<br/>";
  }
?>
 


<br/>
<br/>
<hr/>
  <h5>Summary</h5>
  <?php echo $model->summary; ?>
  <hr/>
  <h5>Story</h5>
  <?php echo $model->story; ?>
  <hr/>
  <h5>Author</h5>
  <?php echo CHtml::encode($model->user->username);?>
  <hr/>

</div>
