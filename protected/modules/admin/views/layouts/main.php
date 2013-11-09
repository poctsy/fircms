<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/form.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <div id="header">
        <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'首页', 'url'=>array('/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'栏目', 'url'=>array('/admin/catalog/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'内容', 'url'=>array('/admin/post/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'单页', 'url'=>array('/admin/page/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>"留言", 'url'=>array('/admin/message/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>"反馈", 'url'=>array('/admin/feedback/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'用户', 'url'=>array('/admin/user/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'权限', 'url'=>array('/rights'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'文件', 'url'=>array('/admin/upload/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>"导航", 'url'=>array('/admin/navigation/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>"配置", 'url'=>array('/admin/config/admin'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'退出'.' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        )); ?>
    </div><!-- mainmenu -->
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('首页',$this->createUrl('/admin')),
		)); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by poctsy.<br/>
        All Rights Reserved.<br/>
        Powered by fircms.com
    </div><!-- footer -->

</div><!-- page -->

</body>
</html>
