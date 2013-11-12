<?php
/* @var $this CatalogController */
/* @var $model Catalog */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php

    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'catalog-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    ));

    ?>


    <?php echo $form->textFieldControlGroup($model, 'name'); ?>

    <?php echo $form->dropDownListControlGroup($model, 'parent',Catalog::selectTree()); ?>


    <?php echo $form->dropDownListControlGroup($model, 'show_type', Catalog::getAllShow_type()); ?>

    <?php echo $form->textFieldControlGroup($model, 'aliases'); ?>

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



    <?php $dropdownConfig = array(

        array('label' => '功能模块', 'url' => '#'),
        TbHtml::menuDivider(),
        array('label' => '单页', 'url' => '#')
    ); ?>

    <?php
    echo $form->textFieldControlGroup($model, 'url',
        array(
            'append'=> TbHtml::buttonDropdown('更多', $dropdownConfig)
        )
    ); ?>



    <?php echo $form->dropDownListControlGroup($model, 'list_view', $this->getPostListViews()); ?>

    <?php echo $form->dropDownListControlGroup($model, 'page_view', $this->getPostPageViews()); ?>

    <?php echo $form->dropDownListControlGroup($model, 'content_view',$this->getPostContentViews()); ?>




    <div class="control-group">
        <?php echo $form->labelEx($model, 'content',array('class'=>"control-label")); ?>
        <?php  $this->widget('FKe', array('model'=>$model));?>
        <?php echo $form->error($model, 'content'); ?>
    </div>


    <?php echo $form->textFieldControlGroup($model, 'title_s'); ?>

    <?php echo $form->textFieldControlGroup($model, 'keyword'); ?>

    <?php echo $form->textAreaControlGroup($model, 'description'); ?>


    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton($model->isNewRecord ? '创建' : '保存', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('重填'),
    )); ?>


    <?php $this->endWidget(); ?>

</div><!-- form -->