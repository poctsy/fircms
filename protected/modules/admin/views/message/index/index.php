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
    'hideHeader'=>true,
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'user_img',
            'header'=>'头像',
            'type'=>'image',
            'value'=>'Yii::app()->baseUrl.DIRECTORY_SEPARATOR.Yii::app()->params->user_imgPath.DIRECTORY_SEPARATOR.$data->orUser_imgLookup()',
            'htmlOptions'=>array('width'=>50),
        ),
        array(
            'name'=>'username',
            'htmlOptions'=>array('width'=>200),
            'value'=>'$data->orUsernameLookup()',
        ),

        array('name'=>'content','value'=>'Fircms::truncate_utf8_string($data->content,50)'),
        array('name'=>'create_time','type'=>'datetime'),
        array(
           // 'htmlOptions' => array('nowrap'=>'nowrap'),
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{reply}{view}{delete}',
            'buttons'=>array(
                'reply' => array(
                    'icon'=>'edit',
                    'options'=>array('title'=>'回复'),
                    'url'=>'Yii::app()->controller->createUrl("reply",array("user"=>$data->orReplyLookup()))',
                ),
                'view' => array(
                    'icon'=>'refresh',
                    'options'=>array('title'=>'查看'),
                    'url'=>'Yii::app()->controller->createUrl("view",array("user"=>$data->orReplyLookup()))',
                ),
            ),
        ),

	),
)); ?>
