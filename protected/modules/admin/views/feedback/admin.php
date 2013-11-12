<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
    '留言'=>array('admin'),
	'管理留言',
);

$this->menu=array(
    array('label'=>'管理留言', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#feedback-grid').yiiGridView('update', {
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
	'id'=>'feedback-grid',
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'#',
            'htmlOptions'=>array('width'=>50),
        ),
        array('name'=>'category',
            'htmlOptions'=>array('width'=>160),
            'value'=>'$data->categoryLookup()',
            'filter'=>Feedback::getAllCategory()),
        array(
            'name'=>'name',
            'htmlOptions'=>array('width'=>100),
        ),
        array('name'=>'status',
            'htmlOptions'=>array('width'=>160),
            'value'=>'$data->statusLookup()',
            'filter'=>Feedback::getAllStatus()),
        array('name'=>'content','value'=>'Fircms::truncate_utf8_string($data->content,50)'),

        array('name'=>'create_time',
            'htmlOptions'=>array('style'=>'width: 200px;'),
            'type'=>'datetime'),
       array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{update},{delete}',


		),
	),
)); ?>

