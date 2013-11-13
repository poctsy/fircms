<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
    '短信息'=>array('index'),
    '查看信息',
);

$this->menu=array(
    array('label'=>'查看信息', 'url'=>array('index'),'active'=>$this->action->id=='index'),
    array('label'=>'发信息', 'url'=>array('send'),'active'=>$this->action->id=='create'),
    array('label'=>'回复信息','url'=>array('reply',"user"=>$to_user_id))

);

?>

<h1>查看信息</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'view/_view',
)); ?>

