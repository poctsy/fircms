<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php Yii::app()->bootstrap->register(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/prettify.css" />
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/holder/2.0/holder.js"></script>
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

')?>
<body>

<!-- Navbar -->
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'brandLabel' =>CHtml::image(Yii::app()->theme->baseUrl.'/images/logo-navbar.png') . "Fircms ",
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
            'items' => array(
                array('label' => '首页', 'url' => array('site/index')),
                array('label' => '文档', 'items' => array(
    array('label' => '教程', 'url' => 'http://www.yiiframework.com/doc/guide'),
    array('label' => 'api', 'url' => 'http://www.yiiframework.com/doc/api'),
    array('label' => 'yiistrap', 'url' => 'http://www.getyiistrap.com/site/widgets'),

),),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbNav',
            'encodeLabel'=>false,
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'您好, '.Yii::app()->user->name.' 后台管理 &nbsp;&nbsp;', 'url'=>array('/admin/default/index'),'linkOptions'=>array('style'=>'padding-right:0px;'), 'visible'=>Yii::app()->user->checkAccess('Admin')),
                array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'<i class="icon-off"></i>[退出]', 'url'=>array('/site/logout'),'linkOptions'=>array('style'=>'padding-left:0px;'), 'visible'=>!Yii::app()->user->isGuest),
            )
        )
    ),
));
?>




        <?php echo $content; ?>


<div style="min-height:50px"></div>
<footer class="footer" style="text-align: center;">
    Copyright &copy; <?php echo date('Y'); ?> by poctsy.
    All Rights Reserved.Powered by fircms.com
</footer><!-- footer -->

</div><!-- page -->

</body>
</html>
