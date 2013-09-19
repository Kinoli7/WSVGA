<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property User $author
 * @property Comment[] $comments
 */
class Post extends CActiveRecord
{
	const STATUS_BORRADOR=1;
    const STATUS_PUBLICADO=2;
    const STATUS_ARCHIVADO=3;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	 public function getUrl()
    {
        return Yii::app()->createUrl('post/view', array(
            'id'=>$this->id,
            'title'=>$this->title,
        ));
    }

	public function getTagLinks()
	{
		$links=array();
		foreach(Tag::string2array($this->tags) as $tag)
			$links[]=CHtml::link(CHtml::encode($tag), array('post/index', 'tag'=>$tag));
		return $links;
	}

		public function getUserLinks()
	{
		$links=array();
		foreach(User::string2array($this->author_id) as $user)
			$links[]=CHtml::link(CHtml::encode($user), array('post/index', 'username'=>$user));
		return $links;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		$purify = new CHtmlPurifier();
		$purify->options = array(
			'HTML.AllowedComments' => array('mes')
		);
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		 return array(
        array('title, content, description, status', 'required',
        	'message'=>'{attribute} no puede estar en blanco'),
        array('title', 'length', 'max'=>128),
        array('status', 'in', 'range'=>array(1,2,3)),
        array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/',
            'message'=>'Tags can only contain word characters.'),
        array('tags', 'normalizeTags'),
 
        array('title, status', 'safe', 'on'=>'search'),
		array('content','filter','filter'=>array($purify,'purify')),
		array('description','filter','filter'=>array($purify,'purify')),
    	);

	}

	public function normalizeTags($attribute,$params){
    $this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
	        if($this->isNewRecord)
	        {
	            $this->create_time=$this->update_time=time();
	            $this->author_id=Yii::app()->user->id;
	        }
	        else
	            $this->update_time=time();
	        return true;
	    }
	    else
	        return false;
	}

	protected function afterSave()
	{
	    parent::afterSave();
	    Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	}
 
	private $_oldTags;
 
	protected function afterFind()
	{
	    parent::afterFind();
	    $this->_oldTags=$this->tags;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'post_id',
            'condition'=>'comments.status='.Comment::STATUS_APPROVED,
            'order'=>'comments.create_time DESC'),
        	'commentCount' => array(self::STAT, 'Comment', 'post_id',
            	'condition'=>'status='.Comment::STATUS_APPROVED),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Titulo',
			'image' => 'Imagen',
			'description' => 'Descripcion',
			'content' => 'Contenido',
			'tags' => 'Tags',
			'status' => 'Estado',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
		);
	}
	public function addComment($comment)
{
    if(Yii::app()->params['commentNeedApproval'])
        $comment->status=Comment::STATUS_PENDING;
    else
        $comment->status=Comment::STATUS_APPROVED;
    $comment->post_id=$this->id;
    return $comment->save();
}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}

