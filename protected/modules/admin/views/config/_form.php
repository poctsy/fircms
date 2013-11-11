<?php
/* @var $this ConfigController */
/* @var $model Config */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'key',array('size'=>60,'maxlength'=>100,'readonly'=>$model->isNewRecord ? false : true)); ?>

    <?php echo $form->textFieldControlGroup($model, 'value'); ?>

<?php echo TbHtml::formActions(array(
    TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('重填'),
)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->