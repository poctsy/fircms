<?php
//会员站内信模块
/**
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 * @version   Message.php  23:49 2013年10月02日
 */



/**
 * This is the model class for table "{{message}}".
 *
 * The followings are the available columns in table '{{message}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property integer $from_user_id
 * @property integer $to_user_id
 */
class Message extends FActiveRecord
{
    public $to_user_name;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{message}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('to_user_name','safe'),
            array('content', 'required'),
            array('to_user_name', 'required','on'=>'send'),
            array('status,from_user_id, to_user_id, create_time', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, content, status, create_time, from_user_id, to_user_id', 'safe', 'on'=>'search'),
            array('id, content, status, create_time, from_user_id, to_user_id', 'safe', 'on'=>'user_search'),
            array('to_user_name,content', 'filter', 'filter' => array($this, 'Purify')),
            array('to_user_name','isUser','on'=>'send'),

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
            'messageReplys'=>array(self::HAS_MANY,'MessageReply','message_id'),
            'to_user'=>array(self::BELONGS_TO,'User','to_user_id'),
            'from_user'=>array(self::BELONGS_TO,'User','from_user_id'),
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
            'create_time' => '时间',
            'from_user_id' => '发信人',
            'to_user_id' => '收信人',
            'phone' => '电话',
            'to_user_name'=>'发给：',

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
        $criteria->compare('from_user_id',$this->from_user_id);
        $criteria->compare('to_user_id',$this->to_user_id);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    public function adminSearch()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('content',$this->content,true);
        $criteria->compare('status',$this->status);
        $criteria->compare('create_time',$this->create_time);
        $criteria->compare('from_user_id',$this->from_user_id);
        $criteria->compare('to_user_id',$this->to_user_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Message the static model class
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

    public function getAllStatus(){
        return array('1'=>'未阅读信息','2'=>'已阅读信息');

    }

    public function isUser($attribute) {
        if(($user=User::model()->find('username=?',array($this->$attribute)))==NUll){
            if(!$this->hasErrors($attribute))$this->addError($attribute, '无此用户');
        }else{
            $this->to_user_id=$user->id;
            $this->from_user_id=Yii::app()->user->id;
        }
    }

    public function fromUser_nameLookup(){
        return $this->from_user->username;
    }
    public function toUser_nameLookup(){
        return $this->to_user->username;
    }

    public function beforeSave() {
//------------------------------------------------------
        if ($this->isNewRecord) {
            $this->create_time = time();
        }
        return true;
    }


    public function orUser_imgLookup(){
        if($this->from_user_id!=Yii::app()->user->id){
            $user_img=$this->from_user->img;
        }else{
            $user_img=$this->to_user->img;
        }

        if(!$user_img)$user_img ='none.png';
        return $user_img;
    }
    public function orUsernameLookup(){
        if($this->from_user_id!=Yii::app()->user->id){
            $user= $this->from_user->username;
        }else{
            $user= '发给:@'.$this->to_user->username;
        }

        return $user;
    }

    public function orReplyLookup(){
        if($this->from_user_id!=Yii::app()->user->id){
            $user= $this->from_user_id;
        }else{
            $user= $this->to_user_id;
        }

        return $user;
    }
}
