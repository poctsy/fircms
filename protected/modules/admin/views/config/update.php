<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
    '配置'=>array('admin'),
	'更新配置',
);

$this->menu=array(
	array('label'=>'创建配置', 'url'=>array('create')),
	array('label'=>'配置管理', 'url'=>array('admin')),
);
?>

<h1>Update Config <?php echo $model->key; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>