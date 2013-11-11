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
    array('label'=>'查看模块', 'url'=>array('index')),
    array('label'=>'添加模块', 'url'=>array('create')),
    array('label'=>'管理模块', 'url'=>array('admin')),
);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>