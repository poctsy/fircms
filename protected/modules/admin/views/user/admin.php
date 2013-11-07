<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
    '用户'=>array('admin'),
	'管理用户',
);

$this->menu=array(
	array('label'=>'添加用户', 'url'=>array('create')),
	array('label'=>'管理用户', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'columns'=>array(
		'id',
		'username',
		'email',
                array(
			'name'=>'created_time',
			'type'=>'datetime',
			'filter'=>false,
		),


                'last_login_ip',
              array(
            'class' => 'CButtonColumn',
            'template' => '{update},{delete}',
            'updateButtonImageUrl' => false,
            'deleteButtonImageUrl' => false,
        ),
	),
)); ?>
