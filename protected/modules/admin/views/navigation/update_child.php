<?php
/* @var $this NavigationController */
/* @var $model Navigation */

$this->breadcrumbs=array(
    '导航'=>array('admin'),
	'管理导航',
);

$this->menu = array(
    array('label' =>"创建导航", 'url' => array('create')),
    array('label' =>"绑定资源", 'url' => array('createchild')),
    array('label' =>"管理导航", 'url' => array('admin')),
);
?>



<?php $this->renderPartial('_form_child', array('model'=>$model)); ?>