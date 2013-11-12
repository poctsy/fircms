<?php
/* @var $this ManageController */
/* @var $model User */

$this->breadcrumbs=array(
    '用户'=>array('admin'),
	'管理用户',
);

$this->menu=array(
    array('label'=>'管理用户', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'创建用户', 'url'=>array('create'),'active'=>$this->action->id=='create'),
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


<h1>管理用户</h1>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

 


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'#',
            'htmlOptions'=>array('width'=>50),
        ),
		'username',
		'email',
                array(
			'name'=>'created_time',
			'type'=>'datetime',
			'filter'=>false,
		),


                'last_login_ip',
              array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update},{delete}',

        ),
	),
)); ?>
