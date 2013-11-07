<?php
/* @var $this ManageController */
/* @var $model Upload */

$this->breadcrumbs=array(
    '文件'=>array('admin'),
	'更新文件',
);

$this->menu=array(
         array('label'=>'管理内容', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>