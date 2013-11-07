<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'管理用户', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('update', "
$('.update-more-button').click(function(){
	$('.update-more').toggle();
	return false;
});
 
");
?>

 

<?php $this->renderPartial('_updateform', array('model'=>$model)); ?>