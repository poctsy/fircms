<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model, 'key'); ?>
    <?php echo $form->textFieldControlGroup($model, 'value'); ?>


    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton( '搜索'),
    )); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->