<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model, 'id'); ?>


    <?php echo $form->dropDownListControlGroup($model, 'catalog_id',Catalog::selectTree()); ?>

    <?php echo $form->textFieldControlGroup($model, 'title'); ?>
    <?php echo $form->textFieldControlGroup($model, 'subtitle'); ?>
    <?php echo $form->textFieldControlGroup($model, 'content'); ?>

    <?php echo TbHtml::formActions(array(
        TbHtml::submitButton( '搜索'),
    )); ?>



<?php $this->endWidget(); ?>

</div><!-- search-form -->