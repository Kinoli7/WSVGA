<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Calendario';
$this->breadcrumbs=array(
	'Calendario',
);
?>


<div class="row">
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
</div>