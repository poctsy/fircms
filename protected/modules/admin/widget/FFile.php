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

    var file_editor = K.editor({
        'fileManagerJson': './index.php?r=admin/upload/kmanageJson',
        'uploadJson': './index.php?r=admin/upload/kupload',
        'allowFileManager': true,
        'extraFileUploadParams':{'$csrfTokenName':'$csrfToken'},
    });

    K('#select_file').click(function() {
        file_editor.loadPlugin('insertfile', function() {

            file_editor.plugin.fileDialog(
                    {
                        fileUrl: K('#Post_file').val(),
                        clickFn: function(url, title) {
                            url = K.formatUrl(url, 'relative');
                            K('#Post_file').val(url);

                            editor.hideDialog();

                        }
                    }

            );
  K('#keTitle').hide();
  K('#keTitle').prev().hide()

        });


    });
    K('#filemanager').click(function() {
        file_editor.loadPlugin('filemanager', function() {
            file_editor.plugin.filemanagerDialog({
                viewType: 'VIEW',
                dirName: 'file',
                clickFn: function(url, title) {
                    url = K.formatUrl(url, 'relative');
                    K('#Post_file').val(url);
                    file_editor.hideDialog();

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
        echo CHtml::button("文件上传", array('id' => 'select_file'));



    }



}