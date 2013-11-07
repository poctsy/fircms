<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
    '单页'=>array('admin'),
	'更新单页',
);

$this->menu=array(

	array('label'=>'创建单页', 'url'=>array('create')),

	array('label'=>'管理单页', 'url'=>array('admin')),
);
?>

<h1>Update Page <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>