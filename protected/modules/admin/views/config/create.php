<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
    '配置'=>array('admin'),
	'创建配置',
);

$this->menu=array(
	array('label'=>'配置管理', 'url'=>array('admin')),
);
?>

<h1>Create Config</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>