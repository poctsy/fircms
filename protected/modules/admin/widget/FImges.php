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
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/imgesform.js');



    }

    public function run()
    {
        $this->renderImages();

    }


    public function renderImages(){

  $html=<<<EOF
        <div id='imagesnow' style='width: 100%;height:260px; border:1px dashed slategray;overflow-y:scroll;' onload="startimagesnow">
    <ul id="sortable"></ul>
</div>
EOF;


echo CHtml::button("图片上传", array('id' => 'Images_selectImage'));
echo CHtml::button("浏览服务器", array('id' => 'filemanager'));
echo $html;


 echo CHtml::activeHiddenField($this->model, 'images');

    }

}