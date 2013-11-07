<?php
/* @var $this CatalogController */
/* @var $model Catalog */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'catalog-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));

    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent'); ?>
        <?php


        echo $form->dropDownList($model, 'parent',Catalog::selectTree(),
            array('class' => 'span4', 'encode' => false, 'style' => 'width:200px;')
        ); ?>
        <?php echo $form->error($model, 'parent'); ?>
    </div>
    <div class="row">

        <?php echo $form->labelEx($model, 'show_type'); ?>
        <?php  echo $form->dropDownList($model, 'show_type', array('list'=>'列表','page'=>'单页'), array('style' => 'width:200px;')); ?>
        <?php echo $form->error($model, 'show_type'); ?>


    </div>



    <div class="row">
        <?php echo $form->labelEx($model, 'thumb'); ?>
        <?php $this->widget('FThumb',array('model'=>$model))?>
        <?php echo $form->error($model, 'thumb'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 30, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'keyword'); ?>
        <?php echo $form->textField($model, 'keyword', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'keyword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textField($model, 'description', array('size' => 30, 'maxlength' => 30)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>








    <div class="row">


        <?php echo $form->labelEx($model, 'list_view'); ?>
        <?php echo $form->dropDownList($model, 'list_view', $this->getPostListViews(), array('style' => 'width:200px')); ?>
        <?php echo $form->error($model, 'list_view'); ?>


    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'page_view'); ?>
        <?php echo $form->dropDownList($model, 'page_view', $this->getPostPageViews(), array('style' => 'width:200px')); ?>
        <?php echo $form->error($model, 'page_view'); ?>

    </div>
    <div class="row">

        <?php echo $form->labelEx($model, 'content_view'); ?>
        <?php  echo $form->dropDownList($model, 'content_view',$this->getPostContentViews(), array('style' => 'width:200px')); ?>
        <?php echo $form->error($model, 'content_view'); ?>


    </div>




    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php  $this->widget('FMiNiKe', array('model'=>$model));?>
        <?php echo $form->error($model, 'content'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->