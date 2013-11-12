<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
    '配置'=>array('admin'),
	'创建配置',
);

$this->menu=array(
    array('label'=>'管理配置', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建配置', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);
?>

    <h1>创建配置</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>