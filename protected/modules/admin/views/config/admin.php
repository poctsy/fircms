<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'配置'=>array('admin'),
	'管理配置',
);

$this->menu=array(
    array('label'=>'管理配置', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
	array('label'=>'创建配置', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>管理配置</h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'config-grid',
    //'cssFile'=>Yii::app()->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
    'columns'=>array(
		'key',
		'value',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}',
            'updateButtonImageUrl'=>false,
		),
	),
)); ?>
