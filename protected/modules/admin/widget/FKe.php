<?php
class FKe extends CWidget
{

    public $model;

    public function run()
    {
        $this->widget('ext.KEditor.KEditor', array(
            'model' => $this->model, //传入form model
            'name' => 'content', //设置name

            'properties' => array(
                //设置接收文件上传的action
                'extraFileUploadParams' => array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken()),
                'uploadJson' => Yii::app()->createUrl('admin/upload/kupload'),
                //设置浏览服务器文件的action，这两个就是上面配置在/admin/default的
                // 'fileManagerJson' => Yii::app()->createUrl('attachment/upload/kmanageJson'),
                'newlineTag' => 'br',
                'urlType'=>'relative',
                'imageSizeLimit'=>'3MB',
                //传值前加js:来标记这些是js代码
                'afterCreate' => "js:function() {
						K('#ChapterForm_all_len').val(this.count());
						K('#ChapterForm_word_len').val(this.count('text'));
					}",
                'afterChange' => "js:function() {
						K('#ChapterForm_all_len').val(this.count());
						K('#ChapterForm_word_len').val(this.count('text'));
					}",
            ),
            'textareaOptions' => array(
                'style' => 'width:98%;height:400px;',
            )
        ));
}



}