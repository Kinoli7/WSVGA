<?php
class PostController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	//DEFINIM EL LAYOUT PER 2 COLUMNES
	// public $layout='//layouts/column2';
	public static $errorCss = 'alert alert-error';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(''),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'create', 'update'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'actions'=>array('destacados'),
				'users'=>array('*'),
			),
		);
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
	$post=$this->loadModel();
	    $comment=$this->newComment($post);
	 
	    $this->render('view',array(
	        'model'=>$post,
	        'comment'=>$comment,
	    ));
		}
	private $_model;

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if(Yii::app()->user->getName()=='admin') {
			$model=new Post;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Post']))
			{
				$model->attributes=$_POST['Post'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}
		else{
			Yii::app()->user->setFlash('error', "Solo el administrador puede crear posts!");
			if(Yii::app()->user->isGuest) $this->redirect(array('site/login'));
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}

protected function newComment($post)
{
    $comment=new Comment;
     if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
    {
        echo CActiveForm::validate($comment);
        Yii::app()->end();
    }
    if(isset($_POST['Comment']))
    {
        if(!Yii::app()->user->isGuest) {
	        	$comment->attributes=$_POST['Comment'];
	        if($post->addComment($comment))
	        {
	            if($comment->status==Comment::STATUS_PENDING)
	                Yii::app()->user->setFlash('commentSubmitted','Gracias por tu comentario. Tu comentario sera publicado cuando sea aprobado.');
	            $this->refresh();
	        }
	    }
	    else {
	    	Yii::app()->user->setFlash('error', "Para comentar debes loguearte!");
	    	$this->redirect(array('site/login'));
	    }
    }
    return $comment;
}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if(Yii::app()->user->getName()=='admin') {
			$model=$this->loadModel($id);

			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);

			if(isset($_POST['Post']))
			{
				$model->attributes=$_POST['Post'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('update',array(
				'model'=>$model,
			));
		}
		else{
			Yii::app()->user->setFlash('error', "Solo el administrador puede actualizar posts!");
			if(Yii::app()->user->isGuest) $this->redirect(array('site/login'));
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->user->getName()=='admin') {
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else{
			Yii::app()->user->setFlash('error', "Solo el administrador puede borrar posts!");
			if(Yii::app()->user->isGuest) $this->redirect(array('site/login'));
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*
		** CREA UNA LLISTA DE LES FOTOGRAFIES
		*/
		$fileListOfDirectory = array();

		$pathTofileListDirectory = '/home/xexu/yii/svga/gallery/' ;

		if(!is_dir($pathTofileListDirectory ))
		{
		    die(" Invalid Directory");
		}

		if(!is_readable($pathTofileListDirectory ))
		{
		    die("You don't have permission to read Directory");
		}

		foreach ( new DirectoryIterator ( $pathTofileListDirectory ) as $file ) {
		      if ($file->getExtension () == "jpg" or $file->getExtension () == "png") {
		          array_push ( $fileListOfDirectory, $file->getBasename () );
	      }
		}

		/* 
		** DEFINIM DATAPROVIDERS PER LES NOTICIES DESTACADES I TOTES LES NOTICIES
		*/

		$this->layout = '//layouts/mainsinfooter';
		$criteriaPost=new CDbCriteria(array(
	        'condition'=>'status='.Post::STATUS_PUBLICADO,
	        'order'=>'update_time DESC',
	        'with'=>'commentCount',
    	));
	    if(isset($_GET['tag']))
	        $criteriaPost->addSearchCondition('tags',$_GET['tag']);
	 
	    $dataProviderPost=new CActiveDataProvider('Post', array(
	        'pagination'=>array(
	            'pageSize'=>5,
	        ),
	        'criteria'=>$criteriaPost,
	    ));

	    $criteriaDestacados=new CDbCriteria(array(
	        'condition'=>'status='.Post::STATUS_PUBLICADO,
	        'order'=>'update_time DESC',
	        'limit'=>4,
    	));
	    if(isset($_GET['tag']))
	        $criteriaPost->addSearchCondition('tags',$_GET['tag']);
	 
	    $dataProviderDestacados=new CActiveDataProvider('Post', array(
	    	'pagination' => false,

	        'criteria'=>$criteriaDestacados,
	    ));

	  	$this->pageTitle = "SVGA - Noticias"; // It could be something from DB or...whatever
	   	$this->render('destacados',array(
	   		'dataProvider1'=>$dataProviderDestacados,
	   	));
	   	$this->layout = '//layouts/column2';
	   	$this->renderPartial('index',array(
        	'dataProvider2'=>$dataProviderPost,
        	'filelist'=>$fileListOfDirectory
    	));
    	
	}

	public function actionDestacados()
	{
		$this->layout='//layouts/mainsinfooter';
		$criteria=new CDbCriteria(array(
        'condition'=>'status='.Post::STATUS_PUBLICADO,
        'order'=>'update_time DESC',
        'with'=>'commentCount',
        'offset' => 0,
        'limit'=>6,
    	));
	    if(isset($_GET['tag']))
	        $criteria->addSearchCondition('tags',$_GET['tag']);
	 
	    $dataProvider=new CActiveDataProvider('Post', array(
	    	'pagination' => false,
	        'criteria'=>$criteria,
	    ));
	  	$this->pageTitle = "SVGA - Destacados"; // It could be something from DB or...whatever
	    $this->render('destacados',array(
	        'dataProvider1'=>$dataProvider,
	    	));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Post']))
			$model->attributes=$_GET['Post'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{
	 if($this->_model===null)
	    {
	        if(isset($_GET['id']))
	        {
	            if(Yii::app()->user->isGuest)
	                $condition='status='.Post::STATUS_PUBLICADO
	                    .' OR status='.Post::STATUS_ARCHIVADO;
	            else
	                $condition='';
	            $this->_model=Post::model()->findByPk($_GET['id'], $condition);
	        }
	        if($this->_model===null)
	            throw new CHttpException(404,'The requested page does not exist.');
	    }
	    return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
