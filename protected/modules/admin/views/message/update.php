<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
    '留言'=>array('admin'),
    '更新留言',
);

$this->menu=array(
	array('label'=>'管理留言', 'url'=>array('admin')),
);
?>

<h1>Update Message <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>