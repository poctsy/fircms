<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>




<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>




<?php echo $form->textFieldControlGroup($model,'username',
    array('label' => 'username', 'placeholder' => 'username')); ?>

<?php echo $form->passwordFieldControlGroup($model,'password',
    array('label' => 'Password', 'placeholder' => 'Password',
        'style' => "background: url(".Yii::app()->theme->baseUrl.'/images/key_24x24.png'.")no-repeat right;"
    )); ?>

<?php echo $form->checkBoxControlGroup($model,'rememberMe', array(
    'label' => 'Remember me',
    'controlOptions' => array('after' => TbHtml::submitButton('登陆')),
)); ?>



<?php $this->endWidget(); ?>
</div><!-- form -->

