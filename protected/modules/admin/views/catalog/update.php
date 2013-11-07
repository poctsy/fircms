<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->breadcrumbs=array(
    '栏目'=>array('catalog/admin'),
	'更新栏目',
);

$this->menu = array(
    array('label' =>  '添加栏目', 'url' => array('create')),
    array('label'=>'管理栏目', 'url'=>array('admin')),

);
?>



<?php $this->renderPartial('_form', array('model'=>$model)); ?>