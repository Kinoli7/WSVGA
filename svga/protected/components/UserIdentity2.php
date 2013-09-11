<?php
/**
 * class UserIdentity
 * @author Igor Ivanović
 * Main extended core yii framework class used for auth system 
 */
class UserIdentity extends CUserIdentity
{

    /**
     * 
     * @var type int
     */
    public $_id;

    /**
     * Overrided parent method
     * @return type 
     */
    public function getId() 
    {
        return $this->_id;
    }

    /**
     * Authenticate user
     * @return type 
     */
    public function authenticate() 
    {
        $user = User::prepareUserForAuthorisation($this->username);
        
	if($user === NULL) 
        {
                $username=strtolower($this->username);
        $user=User::model()->find('LOWER(username)=?',array($username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->username=$user->username;
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
    }
	}
        
	return $this->errorCode;
    }
    
}
