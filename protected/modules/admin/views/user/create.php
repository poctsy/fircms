<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'管理用户', 'url'=>array('admin')),
);


Yii::app()->clientScript->registerScript('create', "
$('.create-more-button').click(function(){

	$('.create-more').toggle();

	return false;
});
 
");

?>



<?php $this->renderPartial('_createform', array('model'=>$model)); ?>