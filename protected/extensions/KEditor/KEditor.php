<?php
class KEditor extends CWidget{
    /*
     * TEXTAREA输入框的属性，保证js调用KE失败时，文本框的样式。
     */
    public $textareaOptions=array();
    /*
     * 编辑器属性集。
     */
    public $properties=array();
    /*
     * TEXTAREA输入框的name，必须设置。
     * 数据类型：String
     */
    public $name;
    /*
     * TEXTAREA的id，可为空
     */
    public $id;

    public $model;

    public $baseUrl;

    public static function getUploadPath(){
        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';
        if(isset(Yii::app()->params->uploadPath)){
            return Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR.Yii::app()->params->uploadPath;
        }
        return Yii::app()->getAssetmanager()
            ->getPublishedPath($dir).DIRECTORY_SEPARATOR.'upload';
    }

    public static function getUploadUrl(){
        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';
        if(isset(Yii::app()->params->uploadPath)){
            return Yii::app()->baseUrl.DIRECTORY_SEPARATOR.Yii::app()->params->uploadPath;
        }
        return Yii::app()->getAssetManager()->publish($dir).'/upload';
    }

    public function init(){

        if($this->name===null)
            throw new CException(Yii::t('zii','The id property cannot be empty.'));

        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';

        $this->baseUrl=Yii::app()->getAssetManager()->publish($dir);
        $cs=Yii::app()->getClientScript();
        $cs->registerCssFile($this->baseUrl.'/themes/default/default.css');
        if(YII_DEBUG) $cs->registerScriptFile($this->baseUrl.'/kindeditor.js');
        else $cs->registerScriptFile($this->baseUrl.'/kindeditor-min.js');
    }

    public function run(){
        $cs=Yii::app()->getClientScript();
        $textAreaOptions=$this->gettextareaOptions();
        $textAreaOptions['name']=CHtml::resolveName($this->model,$this->name);
        $this->id=$textAreaOptions['id']=CHtml::getIdByName($textAreaOptions['name']);
        echo CHtml::activeTextArea($this->model,$this->name,$textAreaOptions);

        $properties_string = CJavaScript::encode($this->getKeProperties());

        $js=<<<EOF
KindEditor.ready(function(K) {
        var editor_$this->id = K.create('#$this->id', 
$properties_string
        );
});
EOF;
        $cs->registerScript('KE'.$this->name,$js,CClientScript::POS_HEAD);
    }

    public function gettextareaOptions(){
        //允许获取的属性
        $allowParams=array('rows','cols','style');
        //准备返回的属性数组
        $params=array();
        foreach($allowParams as $key){
            if(isset($this->textareaOptions[$key]))
                $params[$key]=$this->textareaOptions[$key];
        }
        $params['name']=$params['id']=$this->name;
        return $params;
    }

    public function getKeProperties(){
        $properties_key=array(
            'width',
            'height',
            'minWidth',
            'minHeight',
            'extraParams',
            'items',
            'noDisableItems',
            'filterMode',
            'htmlTags',
            'wellFormatMode',
            'resizeType',
            'themeType',
            'langType',
            'designMode',
            'fullscreenMode',
            'basePath',
            'themesPath',
            'pluginsPath',
            'langPath',
            'minChangeSize',
            'urlType',
            'newlineTag',
            'pasteType',
            'dialogAlignType',
            'shadowMode',
            'useContextmenu',
            'syncType',
            'indentChar',
            'cssPath',
            'cssData',
            'bodyClass',
            'colorTable',
            'afterCreate',
            'afterChange',
            'afterTab',
            'afterFocus',
            'afterBlur',
            'afterUpload',
            'uploadJson',
            'fileManagerJson',
            'allowPreviewEmoticons',
            'allowImageUpload',
            'allowFlashUpload',
            'allowMediaUpload',
            'allowFileUpload',
            'allowFileManager',
            'fontSizeTable',
            'imageTabIndex',
            'formatUploadUrl',
            'fullscreenShortcut',
            'extraFileUploadParams',
            'imageSizeLimit',
        );

        //准备返回的属性数组
        $params=array();
        foreach($properties_key as $key){
            if(isset($this->properties[$key]))
                $params[$key]=$this->properties[$key];
        }
        return $params;
    }
}