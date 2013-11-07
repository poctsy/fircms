<?php
/**
 * @version   Catalog.php  17:17 2013年09月13日
 * @author    poctsy <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */

/**
 * This is the model class for table "{{catalog}}".
 *
 * The followings are the available columns in table '{{catalog}}':
 * @property integer $id
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $name
 * @property string $keyword
 * @property string $description
 * @property integer $show_type
 * @property string $url
 * @property text  $content
 * @property string $list_view
 * @property string page_view
 * @property string content_view
 */



class Catalog extends FActiveRecord {
    /**
     * @return string the associated database table name
     */

    const LEVEL = "…";
    public $_rootName="顶级分类";



    public $parent;


    public function tableName() {
        return '{{catalog}}';
    }


    /**
     * Id of the div in which the tree will berendered.
     */
    public function behaviors() {
        return array(
            'NestedSetBehavior' => array(
                'class' => 'ext.nestedBehavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => false
            ),
        );
    }



    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('parent,name,thumb,show_type', 'safe',),

            array('parent', 'required', 'on' => 'catalogupdate'),
            array('name,url,show_type', 'required'),


            array('show_type,parent,', 'numerical', 'integerOnly' => true),
            array(' keyword, description, url', 'length', 'max' => 30),
            array('title', 'length', 'max' => 50),
            array('list_view,page_view,content_view', 'length', 'max' => 55),

            array('content', 'filter', 'filter' => array($this, 'contentPurify')),
            array('name,title, keyword, description,content, list_view,page_view,content_view', 'filter', 'filter' => array($this, 'Purify')),

            array('id,lft, rgt, level,name,title, keyword, description, show_type, url, content,list_view,page_view, content_view', 'safe', 'on' => 'search'),

        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'navigations'=>array(self::HAS_MANY,'Navigation','catalog_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'parent' => '所属分类',
            'name'=>'栏目名称',
            'url' => '目录网址',
            'thumb' => '缩略图',
            'title' => 'SEO标题',
            'keyword' => 'SEO关键字',
            'description' => 'SEO描述',
            'show_type' => '显示方式',
            'list_view' => '列表模板',
            'page_view'=>'单页模板',
            'content_view' => '内容模板',
            'content' => '栏目简介',
        );
    }



    /**
     * @return array validation rules for model attributes.
     */

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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('show_type', $this->show_type);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('list_view', $this->list_view, true);
        $criteria->compare('page_view', $this->page_view, true);
        $criteria->compare('content_view', $this->content_view, true);
        $criteria->compare('content', $this->content, true);


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
     * @return Catalog the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);

    }








    public function afterSave(){
        $this->createPage($this->show_type,$this->id);
        return true;

    }

    public  function createPage($show_type,$id){


            $plugin=Plugin::model()->findByPk($show_type);
            if($plugin->en_name=='page'){
                $model = new Page;
                $model->catalog_id=$id;
                $model->save();


            }

    }

    public static function printTree() {
        if(Catalog::model()->count() <2)
            return;
        $rootId=Catalog::model()->roots()->find()->id;

        $criteria = new CDbCriteria;
        $criteria->addNotInCondition('id', array($rootId));
        $criteria->order = "lft";
        $catalogs= Catalog::model()->findAll($criteria);


        $level = 0;

        foreach ($catalogs as $n => $catalog) {

            if ($catalog->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($catalog->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $catalog->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }

            echo CHtml::openTag('li', array('id' => 'catalog_' . $catalog->id, 'rel' => $catalog->name));
            echo CHtml::openTag('span');
            echo CHtml::encode($catalog->name);
            echo CHtml::decode('&nbsp;&nbsp;&nbsp;') . CHtml::encode('[ID:' . $catalog->id . ']');
            echo CHtml::closeTag('span');
            echo CHtml::openTag('span', array('class' => 'cudlink'));
            echo CHtml::Link('(上移', Yii::app()->createUrl("admin/catalog/prevup", array("id" => $catalog->id)));
            echo CHtml::Link('下移)', Yii::app()->createUrl("admin/catalog/nextup", array("id" => $catalog->id)));
            echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("admin/catalog/update", array("id" => $catalog->id))));
            echo CHtml::encode("更新");
            echo CHtml::closeTag('a');
            echo CHtml::openTag('a', array("class" => "delete", 'href' => Yii::app()->createUrl("admin/catalog/delete", array("id" => $catalog->id))));
            echo CHtml::encode("删除");
            echo CHtml::closeTag('a');
            echo CHtml::closeTag('span');




            $level = $catalog->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }

    public static function printTree_noAnchors() {
        $catalogs = Catalog::model()->findAll(array('order' => 'lft'));
        $level = 0;

        foreach ($catalogs as $n => $catalog) {
            if ($catalog->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($catalog->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {         //if $catalog->level<$level
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $catalog->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }

            echo CHtml::openTag('li');
            echo CHtml::encode($catalog->name);
            $level = $catalog->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }

    public static function getOptionlevel($level) {
        return str_repeat(self::LEVEL, $level - 1);
    }





    public static function findAllTree_noRoot() {

        $rootId=Catalog::model()->roots()->find()->id;

        $criteria = new CDbCriteria;
        $criteria->addNotInCondition('id', array($rootId));
        $criteria->order = "lft";
        $catalogs= Catalog::model()->findAll($criteria);

        return $catalogs;
    }

    public static function makeSelectTree($catalogs) {

        $treeSelect = array();
        $level = 0;
        //如果nodes为NULL， 则默认他为数组 不报错
        if ($catalogs == NULL)
            $catalogs = array();

        foreach ($catalogs as $catalog) {
            $treeSelect[$catalog->id] = self::getOptionlevel($catalog->level) . $catalog->name;
        }
        return $treeSelect;
    }


    public function selectTree_noRoot(){
     return Catalog::makeSelectTree(Catalog::findAllTree_noRoot());
    }

    public function selectTree(){
        return Catalog::makeSelectTree(Catalog::model()->findAll(array('order'=>'lft')));
    }
    public function createRoot(){
        if(Catalog::model()->roots()->count()<1){
            $root=new Catalog();
            $root->name=$root->_rootName;
            $root->saveNode();
        }
    }

    public function deleteNavigation(){
        if($navigations=$this->navigations){
            foreach($navigations as $navigation){
                $navigationId=$navigation->id;
            }
            Navigation::model()->findByPk($navigationId)->deleteNode();

        }
    }

    public function nameGet($name){
        $catalg=Catalog::model()->find('url=?',array($name));
        return $catalg;
    }


}