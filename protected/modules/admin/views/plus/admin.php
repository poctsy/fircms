<?php
/* @var $this PlusController */
/* @var $model Plus */


$this->breadcrumbs=array(
	'模块'=>array('admin'),
	'管理模块',
);

$this->menu=array(
    array('label'=>'管理模块', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建模块', 'url'=>array('create'),'active'=>$this->action->id=='create'),
);


Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
	$('#plus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1>管理模块</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'plus-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{update},{delete}',
		),
	),
)); ?>