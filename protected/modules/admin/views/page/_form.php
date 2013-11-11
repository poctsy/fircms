<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'title'); ?>

    <?php echo $form->textFieldControlGroup($model, 'subtitle'); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model, 'thumb',array('class'=>"control-label")); ?>
        <div class="controls" >

            <?php if ($this->action->id == 'update'  && $model->thumb !='' ){
                echo TbHtml::image($model->thumb,'',array('style'=>"width:60px;height:60px"));}
            else{
                echo TbHtml::image(Yii::app()->getModule('admin')->getAssetsUrl().'/images/image.png','',array('style'=>"width:60px;height:60px"));
            }
            ?>

            <?php echo $form->fileField($model,'thumb_file')?>
        </div>
        <?php echo $form->error($model, 'thumb_file'); ?>
    </div>

    <?php echo $form->textFieldControlGroup($model, 'aliases'); ?>


    <div class="control-group">
        <?php echo $form->labelEx($model, 'content',array('class'=>"control-label")); ?>
        <?php  $this->widget('FKe', array('model'=>$model));?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <?php echo $form->dropDownListControlGroup($model,'view',$this->getPageViews()); ?>

    <?php echo $form->textFieldControlGroup($model, 'title_s'); ?>

    <?php echo $form->textFieldControlGroup($model, 'keyword'); ?>

    <?php echo $form->textFieldControlGroup($model, 'description'); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('重填'),
    )); ?>


<?php $this->endWidget(); ?>

</div><!-- form -->