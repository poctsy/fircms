<?php
class FImges extends CWidget
{

    public $model;

    public function init()
    {

        $dir = Yii::app()->basePath . '/extensions/KEditor/keSource';
        $baseUrl = Yii::app()->getAssetManager()->publish($dir);
        $cs = Yii::app()->getClientScript();

        $cs->registerCssFile($baseUrl . '/themes/default/default.css');
        $cs->registerCoreScript('jquery.ui');

        if (YII_DEBUG)
            $cs->registerScriptFile($baseUrl . '/kindeditor.js');
        else
            $cs->registerScriptFile($baseUrl . '/kindeditor-min.js');

        $cs->registerCssFile(Yii::app()->getModule('admin')->getAssetsUrl() . '/css/f-imagesview.css');
        $cs->registerScriptFile(Yii::app()->getModule('admin')->getAssetsUrl() . '/js/f-images.js');



    }

    public function run()
    {
        $this->renderImages();

    }


    public function renderImages(){

        $html=<<<EOF
        <div id='imagesnow' style='display:none;min-height:330px;border:1px dashed slategray;overflow-x:scroll;' onload="startimagesnow">
    <ul id="sortable"></ul>
</div>
EOF;


        echo CHtml::openTag('div',array('class'=>'controls'));
        echo $html;
        echo TbHtml::button("图片预览", array('id' => 'Post_togglemagesnow'));
        echo TbHtml::button("上传图片", array('id' => 'Post_selectImage'));
        echo TbHtml::activeHiddenField($this->model, 'images');
        echo CHtml::closeTag('div');
    }

}