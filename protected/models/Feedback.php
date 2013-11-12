<?php
/**
 * @version   Comment.php  22:04 2013年09月26日
 * @author    poctsy <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
/**
 * This is the model class for table "{{feedback}}".
 *
 * The followings are the available columns in table '{{feedback}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property string $name
 * @property string $position
 * @property string $email
 * @property string $phone
 * @property integer $category
 */
class Feedback extends FActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{feedback}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, email', 'required'),
			array('status, create_time, category', 'numerical', 'integerOnly'=>true),
			array('name, position, email, phone', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, status, create_time, name, position, email, phone, category', 'safe', 'on'=>'search'),
            array('content,position,name, email, phone', 'filter', 'filter' => array($this, 'contentPurify')),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => '内容',
			'status' => '状态',
			'create_time' => '创建时间',
			'name' => '姓名',
			'position' => '职位',
			'email' => '邮箱',
			'phone' => '电话',
			'category' => '分类',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('category',$this->category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feedback the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function statusLookup(){
        if($this->status ==1){
            return "未阅读信息";
        }else{
            return "已阅读信息";
        }
    }
    public function categoryLookup(){
        if($this->category ==1){
            return "业务咨询";
        }else{
            return "产品建议";
        }
    }

    public function getAllCategory(){
        return array('1'=>'索取资料','2'=>'产品购买','3'=>'商务合作','4'=>'其他反馈');

    }

    public function getAllStatus(){
        return array('1'=>'未阅读信息','2'=>'已阅读信息');

    }

}
