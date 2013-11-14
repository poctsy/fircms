<?php
$this->breadcrumbs=array(
    '系统信息',
);
?>

<?php echo TbHtml::well('概况', array('size' => TbHtml::WELL_SIZE_SMALL)); ?>
<p><strong>未读信息</strong></p>
<p>留言反馈:
    <?php echo CHtml::link(Feedback::model()->count(array('condition'=>"status='1'"))
        ,array('feedback/admin'));?>
     短信息:
    <?php echo CHtml::link(Message::model()->count(array('condition'=>"status='1'"))
        ,array('message/index'));?>
</p>


<?php echo TbHtml::well('服务器信息', array('size' => TbHtml::WELL_SIZE_SMALL)); ?>

<p>系统版本 : <?php echo Fircms::VERSION;?></p>
<p>操作系统 : <?php echo PHP_OS;?> </p>
<p>PHP环境 : <?php echo PHP_VERSION;?></p>
<p>Mysql版本： <?php echo @mysql_get_server_info();?><?php echo extension_loaded('pdo_mysql')?"PDO(√)":"PDO(×)"; ?></p>

