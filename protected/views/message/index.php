<?php
/* @var $this MessageController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Message Replies',
);

$this->menu=array(
	array('label'=>'Create MessageReply','url'=>array('create')),
	array('label'=>'Manage MessageReply','url'=>array('admin')),
);
?>

<h1>Message Replies</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>