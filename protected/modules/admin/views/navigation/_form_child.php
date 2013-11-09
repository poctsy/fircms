<?php
/* @var $this NavigationController */
/* @var $model Navigation */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'navigation-form',
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
        <?php echo $form->labelEx($model, 'parent'); ?>
        <?php
        echo $form->dropDownList($model, 'parent', Navigation::selectTreeChild(), array('class' => 'span4', 'encode' => false, 'style' => 'width:130px;')
        );
        ?>
        <?php echo $form->error($model, 'parent'); ?>
    </div>



            <div class="row"  >
                <?php echo $form->labelEx($model, 'catalog_id'); ?>
                <?php

                echo $form->dropDownList($model, 'catalog_id',
                    Catalog::selectTree_noRoot(), array('class' => 'span4', 'encode' => false, 'style' => 'width:130px;')
                ); ?>
                <?php echo $form->error($model, 'catalog_id'); ?>
            </div>

    <div class="row"  >
        <?php echo $form->labelEx($model, 'page_id'); ?>
        <?php

        echo $form->dropDownList($model, 'page_id',
            CHtml::listData(Page::model()->findAll(),'id','title'), array('class' => 'span4', 'encode' => false, 'style' => 'width:130px;')
        ); ?>
        <?php echo $form->error($model, 'page_id'); ?>
    </div>

    <div class="row"  >
        <?php echo $form->labelEx($model, 'module'); ?>
        <?php

        echo $form->dropDownList($model, 'module', Navigation::getAllModule()
            , array('class' => 'span4', 'encode' => false, 'style' => 'width:130px;')
        ); ?>
        <?php echo $form->error($model, 'module'); ?>
    </div>

    <div class="row"  >
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php

        echo $form->textField($model, 'link'
            , array('class' => 'span4', 'encode' => false, 'style' => 'width:200px;')
        ); ?>
        <?php echo $form->error($model, 'link'); ?>
    </div>

    <div class="row"  >
        <?php echo $form->labelEx($model, 'bind_type'); ?>
        <?php

        echo $form->dropDownList($model, 'bind_type', Navigation::getAllBind_type()
            , array('class' => 'span4', 'encode' => false, 'style' => 'width:130px;')
        ); ?>
        <?php echo $form->error($model, 'bind_type'); ?>
    </div>




    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? '创建' : '保存'); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->