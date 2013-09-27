<?php

class WebUser extends CWebUser {
	
	public function getUser() {
			return User::model()->findByPk(Yii::app()->user->getID());

	}
	
}
