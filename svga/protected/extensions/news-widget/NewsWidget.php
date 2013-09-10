<?php

class NewsWidget extends CWidget
{
    public function init() {
        $dataProvider = new CActiveDataProvider('_view', array(
		    'criteria'=>array(
		        'order'=>'created DESC',
		    ),
		    'pagination'=>array(
		        'pageSize'=>5,
		    ),
		));
		$this->render('view', array('dataProvider' => $dataProvider));
    }

}