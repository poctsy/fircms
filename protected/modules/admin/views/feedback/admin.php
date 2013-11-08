<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
    '反馈'=>array('admin'),
	'管理反馈',
);

$this->menu=array(
	array('label'=>'管理反馈', 'url'=>array('admin')),
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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-grid',
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array('name'=>'category','value'=>'$data->categorylookup()','filter'=>array('1'=>'索取资料','2'=>'产品购买','3'=>'商务合作','4'=>'其他反馈')),
        array('name'=>'status','value'=>'$data->statuslookup()','filter'=>array('1'=>'未阅读信息','2'=>'已阅读信息')),
        array('name'=>'content','value'=>'Fircms::truncate_utf8_string($data->content,50)'),
        'name',
        'position',
        array('name'=>'create_time','type'=>'datetime'),
       array(
			'class'=>'CButtonColumn',
            'template' => '{update},{delete}',
            'updateButtonImageUrl' => false,
            'deleteButtonImageUrl' => false,
		),
	),
)); ?>

