<?php
/* @var $this PlusController */
/* @var $model Plus */
?>

<?php
$this->breadcrumbs=array(
	'模块'=>array('admin'),
	'创建模块',
);

$this->menu=array(
    array('label'=>'管理模块', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建模块', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);
?>



    <h1>创建模块</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>