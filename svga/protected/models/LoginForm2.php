<?php

class LoginForm extends CFormModel {
	
	public $email;
	public $password;
	
	public function rules() {
		
		return array(
			array('email', 'required'),
			array('password', 'required')
		);
		
	}
	
	public function attributeLabels() {
		return array(
			'email' => Yii::t('SVGA', 'Usuario'),
			'password' => Yii::t('SVGA', 'Contraseña'),
		);
	}
	
}
