<?php
/**
 * @version   Navigation.php  19:17 2013年09月26日
 * @author    poctsy <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */

/**
 * This is the model class for table "{{navigation}}".
 *
 * The followings are the available columns in table '{{navigation}}':
 * @property integer $id
 * @property string $lft
 * @property string $rgt
 * @property string $root
 * @property integer $level
 * @property string $name
 * @property string $position
 * @property integer $catalog_id
 */
class Navigation extends FActiveRecord {

    const LEVEL = "…";
    public $parent;
    public $root=1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{navigation}}';
    }

    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'catalog'=>array(self::BELONGS_TO, 'Catalog', 'catalog_id'),
        );
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,position','required','on'=>'parent'),
            array('parent,','required','on'=>'child'),
            array('id,position', 'unique'),
            array('parent,root,catalog_id', 'numerical', 'integerOnly' => true),
            array('catalog_id', 'length', 'max' => 11),
            array('position,name', 'length', 'max' => 20),

            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('name,id,position, root, catalog_id', 'safe', 'on' => 'search'),
        );
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
                'hasManyRoots' => true
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name'=>'名称',
            'position' => '参数',
            'thumb' => '缩略图',
            'catalog_id' => '栏目',
            'parent'=>'导航条',
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
        $criteria->compare('position', $this->position, true);
        $criteria->compare('root', $this->root);
        $criteria->compare('catalog_id', $this->catalog_id, true);

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
     * @return Navigation the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }


    //兼容sqlite数据库的处理.mysql下可删除
    public function beforeSave(){
        if($this->catalog_id==NULL){
            $this->catalog_id="";
        }

        if($this->position==NULL){
            $this->position="";
        }
        if($this->page_id==NULL){
            $this->page_id="";
        }

        return true;
    }


    public static function printTree() {
        echo CHtml::openTag('ul',array('class'=>'header'));
        echo CHtml::openTag('li');
        echo "导航";
        echo CHtml::closeTag('li');

        echo CHtml::closeTag('ul');
        $criteria = new CDbCriteria;
        $criteria->order = "root,lft";
        $navigations = Navigation::model()->findAll($criteria);

        $level = 0;
        echo CHtml::openTag('span', array('class' => 'node_name_nav') );

        echo CHtml::closeTag('span');


        foreach ($navigations as $n => $navigation) {

            if ($navigation->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($navigation->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $navigation->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }


            if($navigation->isRoot()){
                $name=$navigation->name.'    [#'.$navigation->position.']';
                $updateAction="update";
            }else{
                $catalog=Catalog::model()->findByPk($navigation->catalog_id);
                $name=$catalog->name;
                $updateAction="updatechild";
            }

            echo CHtml::openTag('li', array('id' => 'node_' . $navigation->id, 'rel' => $name));
            echo CHtml::openTag('span', array('class' => 'name') );
            echo CHtml::decode('&nbsp;&nbsp;&nbsp;').CHtml::encode($name);
            echo CHtml::decode('&nbsp;&nbsp;&nbsp;');
            echo CHtml::closeTag('span');



            echo CHtml::openTag('span', array('class' => 'cudlink'));
            if(!$navigation->isRoot()){
                echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("admin/navigation/prevup", array("id" => $navigation->id)),'title'=>'上移'));
                echo CHtml::decode("<i class='icon-arrow-up'></i>");
                echo CHtml::closeTag('a');

                echo ',';
                echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("admin/navigation/nextup", array("id" => $navigation->id)),'title'=>'上移'));
                echo CHtml::decode("<i class='icon-arrow-down'></i>");
                echo CHtml::closeTag('a');

            }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("admin/navigation/".$updateAction, array("id" => $navigation->id)),'title'=>'更新'));
            echo CHtml::decode("<i class='icon-pencil'></i>");
            echo CHtml::closeTag('a');
            echo ',';
            echo CHtml::openTag('a', array("class" => "delete", 'href' => Yii::app()->createUrl("admin/navigation/delete", array("id" => $navigation->id)),'title'=>'删除'));
            echo CHtml::decode("<i class='icon-trash'></i>");
            echo CHtml::closeTag('a');
            echo CHtml::closeTag('span');




            $level = $navigation->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }



    public static function getOptionlevel($level) {
        return str_repeat(self::LEVEL, $level - 1);
    }



    public static function findAllTree() {

        $criteria = new CDbCriteria;
        $criteria->order = "root,lft";
        $navigations = Navigation::model()->findAll($criteria);

        return $navigations;
    }
    public static function findAllTree_noRoot() {
        $rootId=Navigation::model()->roots()->find()->id;
        $criteria = new CDbCriteria;
        $criteria->addNotInCondition('id', array($rootId));
        $criteria->order = "root,lft";
        $navigations = Navigation::model()->findAll($criteria);

        return $navigations;
    }

    public static function findAllRoot(){


        $navigations = Navigation::model()->roots()->findAll();


        return  $navigations;

    }



    public static function makeSelectTree($navigations) {

        $treeSelect = array();
        $level = 0;
        //如果nodes为NULL， 则默认他为数组 不报错
        if ($navigations == NULL)
            $navigations = array();

        foreach ($navigations as $navigation) {
            $treeSelect[$navigation->id] = self::getOptionlevel($navigation->level) . $navigation->name;
        }
        return $treeSelect;
    }

    public static function makeSelectTreeChild($navigations) {
        $treeSelect = array();
        $level = 0;
        //如果nodes为NULL， 则默认他为数组 不报错
        if ($navigations == NULL)
            $navigations = array();
        foreach ($navigations as $navigation) {
            $treeSelect[$navigation->id] = $navigation->name;
        }
        return $treeSelect;
    }

    public function selectTree(){
        return Navigation::makeSelectTree(Navigation::model()->findAll(array('order'=>'lft')));
    }

    public function selectTreeChild(){
        return Navigation::makeSelectTreeChild(Navigation::findAllRoot());
    }
    public static function nameGet($name){
        $catalg=Navigation::model()->find('position=?',array($name));
        return $catalg;
    }


    //前台导航的内容栏目的节点
    public static function navCatalog($name) {
        $root=self::nameGet($name);
        $navCatalog=array();
        $navigations = $root->children()->findAll();;
        foreach ($navigations as $navigation){
            $navCatalog[]=$navigation->catalog_id;
        }
        return $navCatalog;
    }



}
