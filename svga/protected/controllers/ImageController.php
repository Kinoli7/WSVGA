<?php

class ImageController extends Controller
{	public $layout='//layouts/images';
	public function actionIndex()
	{
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

		$this->pageTitle = "SVGA - Galeria de Imagenes";
		$this->render('index', array('filelist'=>$fileListOfDirectory));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}