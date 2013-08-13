<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Home',
);
?>

<h1>Benvingut a <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

 <?php $this->widget('ecalendarview.ECalendarView', array(
  'id' => 'MyCalendar',
  'weeksInRow' => 1,
  'itemView' => '_view',
  'cssFile' => 'css/calendar.css',
  'ajaxUpdate' => true,
  'dataProvider' => array(
    'pagination' => array(
      'currentDate' => new DateTime("now"),
      'pageSize' => 'month',
      'pageIndex' => 0,
      'pageIndexVar' => 'MyCalendar_page',
      'isMondayFirst' => false,
    )
  )
)); ?>

