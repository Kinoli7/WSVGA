<?php 
/* ******************************************************************************************* ->

	EFileCloaker v.0.3beta
			
	How to use:
		1.	Download and extract EFileCloaker in your extension directory.
		2.	Modify your configuration file to auto import the extension folder
			example:
					'import'=>array(
						'application.extensions.*',
					),
		
		3.	Call the widget.
			Example:
                     $this->widget('application.extensions.EFileCloaker', array(
                         'OriginalFileName'=>'Demo File',
                         'OriginalUrl'=>'../../file/demofile.pdf',
                     ));
					
		4. 	Create an action to download files
			Example:
					public function actionDownload()
					{
						$uncloak = new EFileCloaker();
						$uncloak->download();
					}
		
		5. Done
		
	Note:
	Sorry guys, it's still a really rough implementation.
	But I hope it will work just fine. It did with mine at least.
	Will update soon.
 * 
 * History:
 * 11/3/2012  - Refactored variables and function name to be more consistent
 *            - Added support for xsendfile when available in apache
 *              Thanks to Pomstiborius (http://www.yiiframework.com/user/4660/) for pointing it out

<- ************************************************************************************************ */

class EFileCloaker extends CWidget {
  
  public $OriginalFileName; // This would store the name to be shown as the file name.
  public $OriginalUrl; // This is the original url to be the source of the download file.
  
  private $_cloakPrefix = "id";
  private $_cloakAction = "download";
  private $_cloakUrl;
  private $_html;
  private $_fileName = null;
  
  public function setAction($Action)
  {
    if(is_string($Action)) {
      $this->_cloakAction = $Action;
    } else {
      throw new CException("Action must be string");
    }
  }
  
  public function setFileName($FileName)
  {
    if(is_string($FileName)) {
      $this->OriginalFileName = $FileName;
    } else {
      throw new CException("FileName must be string");
    }
  }
  
  public function setOriginalUrl($FileAddress) {
    if(is_string($FileAddress)) {
      $this->OriginalUrl = $FileAddress;
    } else {
      throw new CException("FileAddress must be string");
    }
  }
  
  public function setCloakPrefix($Prefix) {
    if(is_string($Prefix)) {
      $this->_cloakPrefix = $Prefix;
    } else {
      throw new CException("Prefix must be string");
    }
  }

  public function run() {
    if(!isset ($this->OriginalUrl)) {
      throw new CException("Originalurl is not set or it's empty");
    }
    $this->_setOriginalFile();
    $this->_cloakUrl();
    $this->_createMarkUp();
  }
    
  public function download()
  {
  	$cc = new Controller($this->_genRandomNumber());
  	$ses = new CHttpSession();
  	$ses->open();
  	
  	$key = $_GET[$this->_cloakPrefix];
  	
  	if($ses->contains($key))
  	{
	  	$this->OriginalUrl = $ses[$key];
	  	$this->_setOriginalFile(); 
	  	
	  	$tmpOri = str_replace("../","./",$this->OriginalUrl);

	  	if(file_exists($tmpOri))
	  	{
	  		copy(str_replace("../","./",$this->OriginalUrl), $this->OriginalFileName);
	  	} else {
	  		throw new CException("File not found.");
	  	}
	  	
        if ( function_exists('apache_get_modules') && in_array('mod_xsendfile', apache_get_modules()) ) { 
          CHttpRequest::xSendFile($this->OriginalFileName, array("terminate"=>false));
        } else {
          CHttpRequest::sendFile($this->OriginalFileName, file_get_contents($this->OriginalFileName));
        }
        
		unlink($this->OriginalFileName);
		$ses->remove($key);
  	} else 
  	{
  		$cc->redirect(array("/site/index"));
  	}
  }
  
  private function _getFileName()
  {
  	$tmp = explode("/",$this->OriginalUrl);
    $tmp = $tmp[count(explode("/", $this->OriginalUrl))-1];
    return $tmp;
  }
  
  private function _getPath()
  {
    $tmp = explode("/", $this->OriginalUrl);
    array_pop($tmp);
    return implode("/",$tmp);
  }
  
  private function _setOriginalFile()
  {
    $this->OriginalFileName = is_null($this->_fileName)?$this->_getFileName():$this->_fileName;
  }
  
  private function _genRandomNumber()
  {
  	return substr(md5(rand(100,999)), 4,8);
  }
  
  private function _cloakUrl()
  {
  	$random = $this->_genRandomNumber(); 
  	
  	$ses = new CHttpSession();
  	$ses->open();
  	$ses[$random] = $this->OriginalUrl;
  	
  	$this->_cloakUrl = CHtml::normalizeUrl( array("/".Yii::app()->controller->id . "/" . $this->_cloakAction, $this->_cloakPrefix=>$random) ); 
  	
  	return  $this->_cloakUrl;
  }

  private function _createMarkUp() {
  	$this->_html = "<div><a href='".$this->_cloakUrl."'>" . $this->OriginalFileName . "</a></div>";

    echo $this->_html;
  }
  
  private function _set($param){
    isset($param) ? $param = $param : $param = "";
  }
}
?>
