<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
    '内容'=>array('admin'),
	'更新内容',
);

$this->menu=array(
    array('label'=>'管理内容', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建内容', 'url'=>array('create'),'active'=>$this->action->id=='create'),
    array('label'=>'更新内容', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);
?>


    <h1>更新内容 #<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>