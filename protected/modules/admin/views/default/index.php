<?php
$this->breadcrumbs=array(
    '系统信息',
);
$this->menu=array(
    array('label'=>'系统信息', 'url'=>array('default/index'),'action'=>$this->id=='default'),
    array('label'=>'基本配置', 'url'=>array('config/admin')),
    array('label'=>'文件管理', 'url'=>array('upload/admin')),
    array('label'=>'参数管理', 'url'=>array('config/admin')),
    array('label'=>'模块管理', 'url'=>array('plus/admin')),
    array('label'=>'权限管理', 'url'=>array('/auth')),
    array('label'=>'信息管理', 'url'=>array('message/admin')),
);
?>

<?php echo TbHtml::well('概况', array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
<p><strong>未读信息</strong></p>
<p>留言反馈:
    <?php echo CHtml::link(Feedback::model()->count(array('condition'=>"status='1'"))
        ,array('feedback/admin'));?>
     站内信息:
    <?php echo CHtml::link(Message::model()->count(array('condition'=>"status='1'"))
        ,array('message/admin'));?>
</p>


<?php echo TbHtml::well('服务器信息', array('size' => TbHtml::WELL_SIZE_SMALL)); ?>

<p>程序名称 : Fircms</p>
<p>系统版本 : 0.3</p>
<p>操作系统 : <?php echo PHP_OS;?> </p>
<p>PHP环境 : <?php echo PHP_VERSION;?></p>
<p>Mysql版本： <?php echo @mysql_get_server_info();?><?php echo extension_loaded('pdo_mysql')?"PDO(√)":"PDO(×)"; ?></p>

