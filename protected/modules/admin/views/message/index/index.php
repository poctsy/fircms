<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
    '短信息'=>array('index'),
	'查看信息',
);

$this->menu=array(
    array('label'=>'查看信息', 'url'=>array('index'),'active'=>$this->action->id=='index'),
    array('label'=>'发信息', 'url'=>array('send'),'active'=>$this->action->id=='create'),

);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#message-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>查看信息</h1>
<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('index/_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'message-grid',
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
        array(
            'name'=>'from_user_id',
            'htmlOptions'=>array('width'=>50),
        ),

        array('name'=>'content','value'=>'Fircms::truncate_utf8_string($data->content,50)'),
        array('name'=>'create_time','type'=>'datetime'),
        array(
           // 'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{send}{delete}',
            'buttons'=>array(
                'send' => array(
                    'icon'=>'edit',
                    'options'=>array('title'=>'发信息'),
                    'url'=>'Yii::app()->controller->createUrl("send",array("user"=>$data->from_user_id))',
                ),
            ),
        ),

	),
)); ?>
