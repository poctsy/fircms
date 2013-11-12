<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
    '单页'=>array('admin'),
	'更新单页',
);

$this->menu=array(
    array('label'=>'管理单页', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建单页', 'url'=>array('create'),'active'=>$this->action->id=='create'),
    array('label'=>'更新单页', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);
?>

    <h1>更新单页 #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>