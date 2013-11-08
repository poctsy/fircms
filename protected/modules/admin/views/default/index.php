<?php
$this->breadcrumbs=array(
    '系统信息',

);
$this->menu=array(
    array('label'=>'系统信息', 'url'=>array('default/index')),
    array('label'=>'基本配置', 'url'=>array('config/admin')),
    array('label'=>'文件管理', 'url'=>array('upload/admin')),
);
?>
<div class="index-system" >
    <span class="index-system-head">概况</span>
    <span class="index-system-content">
 <p><strong>未读信息</strong></p>
       <p>反馈信息:
           <?php echo CHtml::link(Feedback::model()->count(array('condition'=>"status='1'"))
               ,array('feedback/admin'));?>
           在线留言:
           <?php echo CHtml::link(Message::model()->count(array('condition'=>"status='1'"))
               ,array('message/admin'));?>
       </p>
</span>
</div>

<div class="index-system">
    <span class="index-system-head">使用说明</span>
    <span class="index-system-content">
        <p>1.请先添加内容栏目，方可添加内容。</p>
        <p>2.可绑定内容栏目到导航条，供前台调用</p>
    </span>
</div>

<div class="index-system">
    <span class="index-system-head">服务器信息</span>
    <span class="index-system-content">
         <p>程序名称 : Fircms</p>
         <p>系统版本 : 0.3</p>
         <p>操作系统 : <?php echo PHP_OS;?> </p>
         <p>PHP环境 : <?php echo PHP_VERSION;?></p>
         <p>Mysql版本： <?php echo @mysql_get_server_info();?><?php echo extension_loaded('pdo_mysql')?"PDO(√)":"PDO(×)"; ?></p>
    </span>
</div>

<div class="index-system">
    <span class="index-system-head">使用协议</span>
    <span class="index-system-content">
        本程序遵循Apache Licence2.0协议</br>
        请务必保留网站底部 Powered by fircms.com 的字样和链接,以及程序代码署名</br>
        <a href="#">查看完整用户授权许可协议</a>
    </span>
</div>