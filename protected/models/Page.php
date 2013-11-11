
<?php
/**
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 * @version   Page.php  22:33 2013年11月07日
 */

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $id
 * @property string $thumb
 * @property string $title
 * @property string $title_s
 * @property string $keyword
 * @property string $description
 * @property string $aliases
 * @property string $subtitle
 * @property string $content
 * @property string $view
 * @property integer $create_time
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    public $thumb_file;

	public function tableName()
	{
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title','required'),
			array('thumb', 'length', 'max'=>130),
			array('title, subtitle,title_s,view', 'length', 'max'=>50),
			array('keyword, description, aliases', 'length', 'max'=>30),
			array('content', 'safe'),
            array('id,create_time','length','max'=>11),
            array('create_time', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,create_time,subtitle, title,content', 'safe', 'on'=>'search'),
            array('thumb_file', 'file', 'allowEmpty'=>true,
                'types'=>'jpg, jpeg, gif, png',
                'maxSize' => 1024 * 1024 * 3, // 1MB         以字节计算 b  kb mb
                'tooLarge'=>'上传文件超过 3MB，无法上传',
            ),
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
            'create_time' => '时间',
			'thumb' => '缩略图',
			'title' => '标题',
            'title_s' => 'SEO标题',
			'keyword' => 'SEO关键字',
			'description' => 'SEO描述',
			'aliases' => '目录别名',
            'subtitle'=>'副标题',
			'content' => '内容',
			'view' => '模板',
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
         $criteria->compare('subtitle',$this->subtitle);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
        $criteria->compare('create_time',$this->create_time);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
