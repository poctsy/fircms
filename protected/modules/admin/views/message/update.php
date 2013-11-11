<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
    '信息'=>array('admin'),
    '更新信息',
);

$this->menu=array(
	array('label'=>'管理信息', 'url'=>array('admin')),
);
?>

<h1>Update Message <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>