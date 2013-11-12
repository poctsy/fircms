<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
	'用户'=>array('admin'),
	'更新用户',
);

$this->menu=array(
    array('label'=>'管理用户', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建用户', 'url'=>array('create'),'active'=>$this->action->id=='create'),
    array('label'=>'更新用户', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);

Yii::app()->clientScript->registerScript('update', "
$('.update-more-button').click(function(){
	$('.update-more').toggle();
	return false;
});
 
");
?>


    <h1>更新用户 #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>