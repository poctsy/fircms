<?php
/* @var $this MessageController */
/* @var $model MessageReply */
?>

<?php
$this->breadcrumbs=array(
	'Message Replies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MessageReply', 'url'=>array('index')),
	array('label'=>'Create MessageReply', 'url'=>array('create')),
	array('label'=>'Update MessageReply', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MessageReply', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MessageReply', 'url'=>array('admin')),
);
?>

<h1>View MessageReply #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'content',
		'message_id',
		'user_id',
	),
)); ?>