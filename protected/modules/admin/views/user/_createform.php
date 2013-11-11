<?php
/* @var $this ManageController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'username'); ?>

    <?php echo $form->textFieldControlGroup($model, 'email'); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'password'); ?>


      <div class="create-more" style="display: none">

          <?php echo $form->textFieldControlGroup($model, 'realname'); ?>

          <?php echo $form->textFieldControlGroup($model, 'province'); ?>

          <?php echo $form->textFieldControlGroup($model, 'city'); ?>

          <?php echo $form->textFieldControlGroup($model, 'phone'); ?>

          <?php echo $form->textAreaControlGroup($model, 'profile'); ?>

  </div>
    <?php echo TbHtml::formActions(array(TbHtml::link('更多选项','#',array('class'=>'create-more-button')),
        TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),

    )); ?>



<?php $this->endWidget(); ?>

</div><!-- form -->