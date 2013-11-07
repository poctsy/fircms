<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
    '反馈'=>array('admin'),
	'更新反馈',
);

$this->menu=array(
	array('label'=>'管理反馈', 'url'=>array('admin')),
);
?>

<h1>Update Feedback <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>