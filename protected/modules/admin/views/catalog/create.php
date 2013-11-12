<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->breadcrumbs=array(
    '栏目'=>array('admin'),
	'创建栏目',
);

$this->menu = array(
    array('label'=>'管理栏目', 'url'=>array('admin'), 'active' => $this->action->id=='admin'),
    array('label' =>  '创建栏目', 'url' => array('create'),'active'=>$this->action->id=='create'),
);
?>


    <h1>创建栏目</h1>
<?php $this->renderPartial('_form', array('model' => $model)); ?>