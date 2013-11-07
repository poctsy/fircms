<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
    '单页'=>array('admin'),
	'创建单页',
);

$this->menu=array(

	array('label'=>'管理单页', 'url'=>array('admin')),
);
?>

<h1>Create Page</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>