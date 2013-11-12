<?php
/* @var $this MessageController */
/* @var $model MessageReply */
?>

<?php
$this->breadcrumbs=array(
	'Message Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MessageReply', 'url'=>array('index')),
	array('label'=>'Manage MessageReply', 'url'=>array('admin')),
);
?>

<h1>Create MessageReply</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>