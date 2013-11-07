<?php
class FFile extends CWidget
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


        $csrfTokenName=Yii::app()->request->csrfTokenName;
        $csrfToken=Yii::app()->request->getCsrfToken();
        $cs->registerScript("file","


KindEditor.ready(function(K) {

    var editor = K.editor({
        'fileManagerJson': './index.php?r=admin/upload/kmanageJson',
        'uploadJson': './index.php?r=admin/upload/kupload',
        'allowFileManager': true,
        'extraFileUploadParams':{'$csrfTokenName':'$csrfToken'},
    });

    K('#File_select_file').click(function() {
        editor.loadPlugin('insertfile', function() {

            editor.plugin.fileDialog(
                    {
                        fileUrl: K('#File_file').val(),
                        clickFn: function(url, title) {
                            url = K.formatUrl(url, 'relative');
                            K('#File_file').val(url);

                            editor.hideDialog();

                        }
                    }

            );
  K('#keTitle').hide();
  K('#keTitle').prev().hide()

        });


    });
    K('#filemanager').click(function() {
        editor.loadPlugin('filemanager', function() {
            editor.plugin.filemanagerDialog({
                viewType: 'VIEW',
                dirName: 'file',
                clickFn: function(url, title) {
                    url = K.formatUrl(url, 'relative');
                    K('#File_file').val(url);
                    editor.hideDialog();
                }
            });
        });
    });


});






");
    }

    public function run()
    {

        echo CHtml::activeTextField($this->model, 'file', array('size' => 30));
        echo CHtml::button("文件上传", array('id' => 'File_select_file'));



    }



}