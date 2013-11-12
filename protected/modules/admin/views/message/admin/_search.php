<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textAreaControlGroup($model, 'content'); ?>

<?php echo $form->textFieldControlGroup($model, 'create_time'); ?>

<?php echo $form->textfieldControlGroup($model, 'to_user_name'); ?>

<?php echo $form->textFieldControlGroup($model, 'from_user_id'); ?>


    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton( '搜索'),
    )); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->