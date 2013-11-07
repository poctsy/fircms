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
 * @property string $email
 * @property string $phone
 * @property string $user_id
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
            array('content,position,category，status, name, email, phone', 'filter', 'filter' => array($this, 'contentPurify')),
			array('content, , category，status,', 'required'),
			array('status, create_time, category', 'numerical', 'integerOnly'=>true),
			array('name, email,position, phone', 'length', 'max'=>128),
			array('user_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, status, position,create_time, name, email, phone, user_id, category', 'safe', 'on'=>'search'),
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
			'content' => '反馈内容',
			'status' => '状态',
			'create_time' => '留言时间',
			'name' => '名字',
            'position'=>'职务',
			'email' => '邮箱',
			'phone' => '联系电话',
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
        $criteria->compare('position',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('category',$this->category);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>20,
            )
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

    public function statuslookup(){
        if($this->status ==1){
            return "未答复";
        }else{
            return "已答复";
        }
    }
    public function categorylookup(){
        if($this->category ==1){
            return "业务咨询";
        }else{
            return "产品建议";
        }
    }

    public function everyCategory(){
        $category=array('1'=>'索取资料','2'=>'产品购买','商务合作','其他反馈');
        return $category;
    }

    public function everyStatus(){
        $status=array('1'=>'未阅读信息','2'=>'已阅读信息');
        return $status;
    }
}
