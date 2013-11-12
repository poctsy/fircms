<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'feedback-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() feedbacked in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListControlGroup($model,'category',Feedback::getAllCategory()); ?>

    <?php echo $form->textFieldControlGroup($model, 'name'); ?>

    <?php echo $form->textFieldControlGroup($model, 'email'); ?>

    <?php echo $form->textFieldControlGroup($model, 'phone'); ?>

    <?php echo $form->textFieldControlGroup($model, 'position'); ?>

    <?php echo $form->textAreaControlGroup($model, 'content',array('rows'=>6, 'cols'=>50)); ?>

   <?php echo $form->dropDownListControlGroup($model,'status',Feedback::getAllStatus()); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('重填'),
)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->