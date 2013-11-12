<?php
/* @var $this ManageController */
/* @var $model Upload */

$this->breadcrumbs=array(
    '文件'=>array('admin'),
	'更新文件',
);

$this->menu=array(
    array('label'=>'管理文件', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'更新文件', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);
?>


    <h1>更新文件 #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>