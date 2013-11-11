<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">


    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'id' => 'post-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),

    ));
    ?>



    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListControlGroup($model, 'catalog_id',Catalog::selectTree()); ?>

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





    <div class="control-group">

        <?php echo $form->labelEx($model, 'soft',array('class'=>"control-label")); ?>
        <div class="controls">
        <?php if ($this->action->id == 'update'){
            echo TbHtml::textField( 'soft_file',$model->soft, array('readonly' => true,)); }
         else{
         echo TbHtml::textField( 'soft_file',$model->soft, array('readonly' => true,));
        } ?>
        <?php echo $form->fileField($model,'soft_file')?>
        </div>
        <?php echo $form->error($model, 'soft_file'); ?>
    </div>

    <div class="control-group">

        <?php echo $form->labelEx($model, 'images',array('class'=>"control-label")); ?>
        <?php $this->widget('FImges',array('model'=>$model))?>
        <?php echo $form->error($model, 'images'); ?>
    </div>

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