<?php
class FThumb extends CWidget
{

    public $model;

    public function run()
    {
        $this->widget('ext.KEditor.ThumbKEditor', array(
            'model' =>$this->model, //传入form model
            'name' =>'thumb', //设置name
            'properties' => array(
                'extraFileUploadParams' => array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken()),
                'uploadJson' => Yii::app()->createUrl('admin/upload/kupload'),
            ),
            'textfieldOptions' => array(
                'size' => '30',
            )
        )
        );

}



}