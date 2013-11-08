<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
    '内容'=>array('admin'),
	'管理内容',
);

$this->menu=array(
    	array('label'=>'创建内容', 'url'=>array('create')),
        array('label'=>'管理内容', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#post-grid').yiiGridView('update', {
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
	'id'=>'post-grid',
    //'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array('name'=>'catalog_id','value'=>'$data->catalogLookup()','filter'=>Catalog::selectTree()),
        'title',
              array(
            'class' => 'CButtonColumn',
            'template' => '{update},{delete}',
            'updateButtonImageUrl' => false,
            'deleteButtonImageUrl' => false,
        ),
	),
)); ?>
