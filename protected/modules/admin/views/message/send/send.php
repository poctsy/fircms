<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<?php
$this->breadcrumbs=array(
    '短信息'=>array('index'),
    '发信息',
);

$this->menu=array(
    array('label'=>'查看信息', 'url'=>array('index'),'active'=>$this->action->id=='index'),
    array('label'=>'发信息', 'url'=>array('send'),'active'=>$this->action->id=='send'),

);
?>

<h1>发信息</h1>

<?php $this->renderPartial('send/_form', array('model'=>$model)); ?>