<?php
/* @var $this ManageController */
/* @var $model Upload */

$this->breadcrumbs=array(
    '文件'=>array('admin'),
    '管理文件',
);

$this->menu=array(
    array('label'=>'管理文件', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#upload-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<h1>管理文件</h1>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'upload-grid',
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
    'dataProvider'=>$model->search(),
    'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'#',
            'htmlOptions'=>array('width'=>50),
        ),
        'type',
        'name',
        array(
            'name'=>'show',
            'header'=>'预览',
            'type'=>'image',
            'value'=>'$data->getImage()',
            'htmlOptions'=>array('width'=>50),
        ),
        'path',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' =>'{delete}',

        ),
    ),
)); ?>
<p><span style="color:red;">*</span>删除实体文件</p>