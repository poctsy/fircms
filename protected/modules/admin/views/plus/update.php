<?php
/* @var $this PlusController */
/* @var $model Plus */
?>

<?php
$this->breadcrumbs=array(
	'模块'=>array('admin'),
	'修改模块',
);

$this->menu=array(
    array('label'=>'管理模块', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建模块', 'url'=>array('create'),'active'=>$this->action->id=='create'),
    array('label'=>'更新模块', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);
?>


    <h1>更新模块 #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>