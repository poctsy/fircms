<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model, 'thumb'); ?>
        <?php $this->widget('FThumb',array('model'=>$model))?>
        <?php echo $form->error($model, 'thumb'); ?>
    </div>


	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php  $this->widget('FKe', array('model'=>$model));?>
        <?php echo $form->error($model, 'content'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'view'); ?>
		<?php echo $form->dropDownList($model,'view',$this->getPageViews(), array('style' => 'width:200px')); ?>
		<?php echo $form->error($model,'view'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'title_s'); ?>
        <?php echo $form->textField($model, 'title_s', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model,'title_s'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'keyword'); ?>
        <?php echo $form->textField($model,'keyword',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'keyword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows'=>"5", 'cols'=>"90")); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->