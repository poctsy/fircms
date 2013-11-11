<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'message-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textAreaControlGroup($model, 'content'); ?>

    <?php echo $form->textFieldControlGroup($model, 'status'); ?>

    <?php echo $form->textFieldControlGroup($model, 'create_time'); ?>

    <?php echo $form->textFieldControlGroup($model, 'from_user_id'); ?>

    <?php echo $form->textFieldControlGroup($model, 'to_user_id'); ?>

    <?php echo $form->textFieldControlGroup($model, 'email'); ?>

    <?php echo $form->textFieldControlGroup($model, 'phone'); ?>

    <?php echo $form->textFieldControlGroup($model, 'other_contact'); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('重填'),
)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->