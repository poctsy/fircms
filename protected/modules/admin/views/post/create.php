<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
    '内容'=>array('admin'),
	'创建内容',
);

$this->menu=array(
    array('label'=>'管理内容', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建内容', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);
?>


    <h1>创建内容</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>