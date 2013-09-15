<?php

/**
 * This is the model class for table "movie".
 *
 * The followings are the available columns in table 'movie':
 * @property string $id
 * @property string $title
 * @property string $releasedate
 * @property string $summary
 * @property string $story
 * @property string $created
 * @property string $updated
 * @property integer $active
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Movieimage[] $movieimages
 */
class Movie extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Movie the static model class
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
		return 'movie';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, user_id', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('user_id', 'length', 'max'=>10),
			array('releasedate, summary, story, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, releasedate, summary, story, created, updated, active, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'movieimages' => array(self::HAS_MANY, 'Movieimage', 'movie_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'releasedate' => 'Releasedate',
			'summary' => 'Summary',
			'story' => 'Story',
			'created' => 'Created',
			'updated' => 'Updated',
			'active' => 'Active',
			'user_id' => 'User',
		);
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('releasedate',$this->releasedate,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('story',$this->story,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}