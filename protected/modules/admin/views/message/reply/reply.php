<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<?php
$this->breadcrumbs=array(
    '短信息'=>array('index'),
    '回复',
);

$this->menu=array(
    array('label'=>'查看信息', 'url'=>array('index'),'active'=>$this->action->id=='index'),
    array('label'=>'发信息', 'url'=>array('send'),'active'=>$this->action->id=='send'),
    array('label'=>'回复', 'url'=>'#','active'=>$this->action->id=='reply'),
);
?>

<h1>发信息</h1>

<?php $this->renderPartial('reply/_form', array('model'=>$model,'to_user_name'=>$to_user_name)); ?>