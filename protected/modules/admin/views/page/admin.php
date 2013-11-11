<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
    '单页'=>array('admin'),
	'管理单页',
);

$this->menu=array(

	array('label'=>'创建单页', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'#',
            'htmlOptions'=>array('width'=>50),
        ),
		'title',
        array('name'=>'create_time',
            'htmlOptions'=>array('style'=>'width: 200px;'),
            'type'=>'datetime'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{update},{delete}',


        ),
	),
)); ?>
