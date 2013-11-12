<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
    '留言'=>array('admin'),
	'更新留言',
);

$this->menu=array(
    array('label'=>'管理留言', 'url'=>array('admin'),'active'=>$this->action->id=='admin'),
    array('label'=>'更新留言', 'url'=>array('update'),'active'=>$this->action->id=='update'),
);
?>

    <h1>更新留言 #<?php echo $model->id; ?></h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>