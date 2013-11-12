<?php
/**
 * @version   User.php  19:30 2013年09月11日
 * @author    poctsy <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property integer $created_time
 * @property integer $last_login_time
 * @property string $last_login_ip
 * @property string $realname
 * @property integer $phone
 */
class User extends FActiveRecord {

    /**
     * @return string the associated database table name
     */
    public $oldpassword;

    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username,email,password', 'required'),
            array('username,  email,', 'unique'),
            array('email', 'email', 'message' => '电子邮箱格式不正确'),
            array('username', 'length', 'max' => 50, 'min' => 2, 'tooLong' => '帐号位数太长', 'tooShort' => '帐号位数太短'),
            array('password', 'length', 'max' => 128, 'min' => 6, 'tooLong' => '帐号位数太长', 'tooShort' => '帐号位数太短'),
            array('phone,realname', 'length', 'max' => 30),
            array('id, username,email, created_time, last_login_time,last_login_ip,realname,phone', 'safe', 'on' => 'search'),
            array('username, realname', 'filter', 'filter' => array($this, 'Purify')),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'authassignments' => array(self::HAS_MANY, 'Authassignment', 'userid'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => '帐号',
            'password' => '密码',
            'email' => '邮箱',
            'created_time' => '创建时间',
            'last_login_time' => '最后登录时间',
            'last_login_ip' => '登录ip',
            'realname' => '姓名',
            'phone' => '电话',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('last_login_time', $this->last_login_time, true);
        $criteria->compare('last_login_ip', $this->last_login_ip, true);
        $criteria->compare('realname', $this->realname, true);
        $criteria->compare('phone', $this->phone, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination'=>array(
                'pageSize'=>20,
            )
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function contentPurify($value) {
        $p = new CHtmlPurifier();
        $cleanHtml = $p->purify($value);
        return $cleanHtml;
    }
   public function Purify($value) {
        $p = new CHtmlPurifier();
        $p->options = array('HTML.Allowed' => 'strong,em,u,h1,h2,h3,h4');
        $cleanHtml = $p->purify($value);
        return $cleanHtml;
   }
    /**
     * Checks if the given password is correct.
     * @param string the password to be validated
     * @return boolean whether the password is valid
     */
    public function validatePassword($password) {
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    /**
     * Generates the password hash.
     * @param string password
     * @param string salt
     * @return string hash
     */
    public function hashPassword($password, $salt) {
        return md5($salt . $password);
    }

    public function generate_salt($length) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_[]{}<>~`+=,.;:/?|';
        $salt = '';
        for ($i = 0; $i < $length; $i++) {
            // 这里提供两种字符获取方式  
            // 第一种是使用 substr 截取$chars中的任意一位字符；  
            // 第二种是取字符数组 $chars 的任意元素  
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);  
            $salt .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $salt;
    }

    public function afterFind() {
        $this->oldpassword = $this->password;
        return true;
    }

    public function beforeSave() {
//------------------------------------------------------
        if ($this->isNewRecord) {
            $this->salt = $this->generate_salt(32);
            $this->password = $this->hashPassword($this->password, $this->salt);
            $this->created_time = time();
        }

        return true;
    }

}
