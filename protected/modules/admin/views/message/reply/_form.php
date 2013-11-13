<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>
发送短信息给 <u><?php echo $to_user_name; ?></u>
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




<?php echo TbHtml::formActions(array(
    TbHtml::submitButton('发送', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
    TbHtml::resetButton('重填'),
)); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->