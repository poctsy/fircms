<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('admin'),
	'创建用户',
);

$this->menu=array(
    array('label'=>'管理用户', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建用户', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);


Yii::app()->clientScript->registerScript('create', "
$('.create-more-button').click(function(){

	$('.create-more').toggle();

	return false;
});
 
");

?>

<h1>创建用户</h1>

<?php $this->renderPartial('_createform', array('model'=>$model)); ?>