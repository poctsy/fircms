<?php

/* @var $this NavigationController */
/* @var $model Navigation */

$this->breadcrumbs = array(
    '导航'=>array('admin'),
    '更新导航',
);

$this->menu = array(
    array('label' =>"管理导航", 'url' => array('admin')),
);
?>




<?php $this->renderPartial('_form_child', array('model' => $model)); ?>