<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
    '内容'=>array('admin'),
	'更新内容',
);

$this->menu=array(
    	array('label'=>'创建内容', 'url'=>array('create')),
        array('label'=>'管理内容', 'url'=>array('admin')),
);
?>

 


<?php $this->renderPartial('_form', array('model'=>$model)); ?>