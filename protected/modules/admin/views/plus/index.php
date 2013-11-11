<?php
/* @var $this PlusController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'查看模块',
);

$this->menu=array(
    array('label'=>'查看模块', 'url'=>array('index')),

);
?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'id',
        'name',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template' => '{copy}',
        ),
    ),
)); ?>