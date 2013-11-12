<?php
/* @var $this MessageController */
/* @var $model MessageReply */
?>

<?php
$this->breadcrumbs=array(
	'Message Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MessageReply', 'url'=>array('index')),
	array('label'=>'Create MessageReply', 'url'=>array('create')),
	array('label'=>'View MessageReply', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MessageReply', 'url'=>array('admin')),
);
?>

    <h1>Update MessageReply <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>