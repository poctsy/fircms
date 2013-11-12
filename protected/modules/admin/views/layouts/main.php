<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php Yii::app()->bootstrap->register(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getModule('admin')->getAssetsUrl(); ?>/css/main.css" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<?php Yii::app()->ClientScript->registerCss(
    $this->id.$this->action->id,'
body {
 font-family: 微软雅黑, Verdana, sans-serif, 宋体;
}
.form-horizontal .control-label {
 width:80px;
}
.form-horizontal .controls {
 margin-left:100px;
}

')?>
<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(

        'brandLabel' => 'FirCMS',

        'brandUrl' => array('/admin'),
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items'=>array(
                    //        array('label'=>'系统', 'url'=>array('/admin/default/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'栏目', 'url'=>array('/admin/catalog/admin'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'内容', 'url'=>array('/admin/post/admin'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'单页', 'url'=>array('/admin/page/admin'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>"留言", 'url'=>array('/admin/feedback/admin'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>"信息", 'url'=>array('/admin/message/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),

                )
            ),
            array(
                        'class'=>'bootstrap.widgets.TbNav',
                        'encodeLabel'=>false,

                'htmlOptions'=>array('class'=>'pull-right'),
                        'items'=>array(
                            array('label'=>TbHtml::labelTb('您好, '.Yii::app()->user->name.' 欢迎使用 FirCMS!&nbsp;&nbsp;',array('style'=>'margin-top:8px;padding-right:0px;')), 'visible'=>!Yii::app()->user->isGuest),
                             array('label'=>'系统主页 &nbsp;', 'url'=>array('/admin/default/index'),'linkOptions'=>array('style'=>'padding-right:0px;'), 'active' => false, 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'网站主页 &nbsp;', 'url'=>array('/site/index'),'linkOptions'=>array('style'=>'padding-right:0px;'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'<i class="icon-off" style="margin-top:4px;"></i>[退出]', 'url'=>array('/site/logout'),'linkOptions'=>array('style'=>'padding-left:0px;'), 'visible'=>!Yii::app()->user->isGuest),
                        )
                    )
        )
    )
)

; ?>


        <?php echo $content; ?>

<div style="min-height:50px"></div>
<footer class="footer" style="text-align: center;">
    Copyright &copy; <?php echo date('Y'); ?> by poctsy.
    All Rights Reserved.Powered by fircms.com
</footer><!-- footer -->

</div><!-- page -->

</body>
</html>
