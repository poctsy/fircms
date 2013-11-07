<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">




    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'post-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>



    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'catalog_id'); ?>
        <?php
        echo $form->dropDownList($model, 'catalog_id',Catalog::selectTree());

        ?>

        <?php echo $form->error($model, 'catalog_id'); ?>
    </div>



    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'thumb'); ?>
        <?php $this->widget('FThumb',array('model'=>$model))?>
        <?php echo $form->error($model, 'thumb'); ?>
    </div>



    <div class="row">

        <?php echo $form->labelEx($model, 'file'); ?>
        <?php  $this->widget('FFile', array('model'=>$model));?>
        <?php echo $form->error($model, 'file'); ?>
    </div>
    <div class="row">

        <?php echo $form->labelEx($model, 'images') . '(温馨提示：拖拽图片可自由排序)'; ?>
        <?php $this->widget('FImges',array('model'=>$model))?>
        <?php echo $form->error($model, 'images'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php  $this->widget('FKe', array('model'=>$model));?>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keyword'); ?>
        <?php echo $form->textField($model, 'keyword', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'keyword'); ?>
    </div>



    <?php //echo $form->hiddenField($model, 'images', array('size' => 30, 'maxlength' => 30));   ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->