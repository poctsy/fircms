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

<?php echo $form->textFieldControlGroup($model, 'status'); ?>

<?php echo $form->textFieldControlGroup($model, 'create_time'); ?>

<?php echo $form->textFieldControlGroup($model, 'from_user_id'); ?>

<?php echo $form->textFieldControlGroup($model, 'email'); ?>

<?php echo $form->textFieldControlGroup($model, 'phone'); ?>

<?php echo $form->textFieldControlGroup($model, 'other_contact'); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton( '搜索'),
    )); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->