<?php
/* @var $this FeedbackController */
/* @var $model Feedback */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model, 'id'); ?>

    <?php echo $form->dropDownListControlGroup($model,'category',Feedback::getAllCategory()); ?>

    <?php echo $form->dropDownListControlGroup($model,'status',Feedback::getAllStatus()); ?>

    <?php echo $form->textFieldControlGroup($model, 'name'); ?>


    <?php echo $form->textFieldControlGroup($model, 'position'); ?>

    <?php echo $form->textFieldControlGroup($model, 'email'); ?>

    <?php echo $form->textFieldControlGroup($model, 'phone'); ?>

    <?php echo $form->textAreaControlGroup($model, 'content',array('rows'=>6, 'cols'=>50)); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton( '搜索'),
    )); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->