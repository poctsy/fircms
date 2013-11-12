<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->breadcrumbs=array(
    '栏目'=>array('admin'),
	'更新栏目',
);

$this->menu = array(
    array('label'=>'管理栏目', 'url'=>array('admin'), 'active' => $this->action->id=='admin'),
    array('label' => '创建栏目', 'url' => array('create'),'active'=>$this->action->id=='create'),
    array('label'=>'更新栏目', 'url'=>'#', 'active' => $this->action->id=='update'),
);
?>


    <h1>更新栏目 #<?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>