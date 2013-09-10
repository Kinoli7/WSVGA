<?php

class UserController extends Controller {

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	public function actionLogin() {
		//només deixem loggejar si no ho està
		if(!Yii::app()->user->isGuest) {
			$this->redirect($this->createUrl(Yii::app()->homeUrl));
		} else {
			$form = new LoginForm();
			if(($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['LoginForm'])) {
				//ens estan enviant dades per iniciar sessió
				$user = new PasswordIdentity($_POST['LoginForm']['email'], $_POST['LoginForm']['password']);
				$result = $user->authenticate();
				if($result == PasswordIdentity::CREDENTIALS_ERROR) {
					Yii::app()->user->setFlash('error', Yii::t('engrescat', 'Usuari i/o contrasenya incorrecte'));
				} else if($result == PasswordIdentity::EMAIL_NOT_ACTIVATED) {
					Yii::app()->user->setFlash('error', Yii::t('engrescat', 'Encara no has confirmat la teva direcció de correu electrònic!'));					
				} else if($result == PasswordIdentity::NOT_ACTIVATED) {
					Yii::app()->user->setFlash('error', Yii::t('engrescat', 'Aquest compte està desactivat'));
				} else if($result == PasswordIdentity::OK) {
					
					Yii::app()->user->login($user);
					
					Yii::app()->user->setFlash('success', Yii::t('engrescat', 'Sessió iniciada correctament!'));
					$this->redirect(Yii::app()->user->returnUrl);				
				} else {
					Yii::app()->user->setFlash('error', Yii::t('engrescat', 'Error en iniciar la sessió'));
				}
				
				$form->password = '';
				$this->render('login', array('formModel' => $form));
			} else {
				//mostrem el formulari
				$this->render('login', array('formModel' => $form));
			}
		}
	}

	public function actionLogout() {
		if(Yii::app()->user->isGuest) {
			Yii::app()->user->setFlash('error', Yii::t('engrescat', 'No tens cap sessió iniciada!'));			
		} else {
			Yii::app()->user->setFlash('sucess', Yii::t('engrescat', "Sessió tancada correctament"));
		}
		$this->redirect($this->createUrl(Yii::app()->homeUrl));
	}
	
	public function actionRegister() {
		//nomes es pot registrar la gent que no té la sessió iniciada
		if(!Yii::app()->user->isGuest) {
			Yii::app()->user->setFlash('success', Yii::t('engrescat', "Ja tens la sessió iniciada!"));
			$this->redirect($this->createUrl(Yii::app()->homeUrl));
		} else {
			$user = new User('register');
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['User'])) {
				//ens estan enviant les dades
				$user->attributes = $_POST['User'];
				if($user->validate()) {
					$user->email_token = Yii::app()->token->createUnique(40, User::model(), 'email_token');
					$user->email_activated = 0;
					$user->password = sha1($user->password);
					$user->save(false);
					
					//enviem el correu amb la direcció per activar el compte
					$message = new YiiMailMessage();
					$message->setFrom(array('engrescat@telecogresca.com' => 'AC Telecogresca - Engresca\'t'));
					$message->setTo(array($user->email => $user->name));
					$message->subject = Yii::t('engrescat', 'Activeu el vostre compte');
					$message->view = 'email_activate';
					$message->setBody(array('name' => $user->name, 'token' => $user->email_token), 'text/html');
					Yii::app()->mail->send($message);					
					
					Yii::app()->user->setFlash('success', Yii::t('engrescat', "S'ha completat correctament el registre. T'hem enviat un correu electrònic amb instruccions sobre com activar el teu compte."));
					$this->redirect($this->createUrl(Yii::app()->homeUrl));				
				}
			} else {
				$user->subscribed = true;
			}
			$this->render('register', array('formModel' => $user));
		}
	}

	public function actionForgot() {
		
		if(empty($_GET['token']) || empty($_GET['email'])) {
			$model = new ForgotForm('forgot');
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				//si tot és vàlid, enviem el correu electrònic per recuperar el password
				$model->attributes = $_POST['ForgotForm'];
				if($model->validate()) {
					$user = User::model()->find('email = :email', array(':email' => $model->email));
					if(empty($user)) {
						Yii::app()->user->setFlash('error', Yii::t('engrescat', 'No existeix cap usuari registrat amb aquest coreu electrònic'));
					} else {
						$user->activateForgotPassword();
						Yii::app()->user->setFlash('success', Yii::t('engrescat', "T'hem enviat un correu electrònic amb les intruccions que has de seguir per recuperar el password"));
						$this->redirect($this->createUrl(Yii::app()->homeUrl));
					}
				}
			}
			//mostrem pantalla per demanar l'enllaç per correu electrònic
			$this->render('forgot_send_email', array('formModel' => $model));
			
		} else {
			//comprovem si el token és correcte
			$user = User::model()->find('email = :email AND email_recovery_token = :token', array(':email' => $_GET['email'], ':token' => $_GET['token']));
			if(empty($user)) {
				Yii::app()->user->setFlash('error', Yii::t('engrescat', "Les dades no són vàlides!"));
				$this->redirect($this->createUrl(Yii::app()->homeUrl));
			//el token és vàlid durant un dia (60*60*24=86400)	
			} else if(empty($user->email_recovery_timestamp) || ($user->email_recovery_timestamp + 86400) < time()) {
				Yii::app()->user->setFlash('error', Yii::t('engrescat', "Han passat més de 24h des de que et vam enviar l'enllaç i ha caducat. Torna a demanar-ne un"));
				$this->redirect($this->createUrl('user/forgot'));
			} else if($_SERVER['REQUEST_METHOD'] == 'POST') {
				//ens estan enviant la nova contrasenya
				$model = new ForgotForm('changepass');
				$model->attributes = $_POST['ForgotForm'];
				if($model->validate()) {
					//guardem el nou password, xifrat amb sha1
					$user->password = sha1($model->password);
					$user->save(false);
					Yii::app()->user->setFlash('success', Yii::t('engrescat', "La teva contrasenya s'ha canviat correctament"));
					$this->redirect($this->createUrl(Yii::app()->homeUrl));
				} else {
					$this->render('forgot_change_pass', array('formModel' => $model));
				}
			} else {
				$model = new ForgotForm('changepass');
				$this->render('forgot_change_pass', array('formModel' => $model));
			}
		}
	}
	
	/**
	 * Funció encarregada d'activar els comptes amb el token que s'envia per correu electrònic
	 */
	public function actionActivate() {
		
		if(!empty($_GET['token'])) {
			$user = User::model()->find('email_token = :token', array(':token' => $_GET['token']));
			if(empty($user)) {
				Yii::app()->user->setFlash('error', Yii::t('engrescat', "No existeix cap usuari amb aquest token"));
				$this->redirect($this->createUrl(Yii::app()->homeUrl));		
			} else {
				$user->email_activated = 1;
				if($user->save()) {
					Yii::app()->user->setFlash('success', Yii::t('engrescat', "Hem activat el teu compte correctament. Ja pots iniciar sessió! :)"));
				$this->redirect($this->createUrl(Yii::app()->homeUrl));	
				} else {
					Yii::app()->user->setFlash('error', Yii::t('engrescat', "Error en activar el teu compte"));
					$this->redirect($this->createUrl(Yii::app()->homeUrl));	
				}
			}
		} else {
			Yii::app()->user->setFlash('error', Yii::t('engrescat', "No ens has passat cap token!"));
			$this->redirect($this->createUrl(Yii::app()->homeUrl));	
		}
	}
}
