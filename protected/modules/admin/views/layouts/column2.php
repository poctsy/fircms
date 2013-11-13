<?php /* @var $this Controller */ ?>
<?php $this->beginContent('application.modules.admin.views.layouts.main'); ?>
<div class="container-fluid" style="padding: 70px;">
    <div class="row-fluid">

    <div class="span2">
        <?php $user_img=User::model()->findByPk(Yii::app()->user->id)->img;
        if(!$user_img)$user_img ='none.png';

        ?>
        <?php $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_TABS,
            'encodeLabel'=>false,
            'stacked' => true,
            'items' =>array(
                array('label'=>CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.Yii::app()->params->user_imgPath.DIRECTORY_SEPARATOR.$user_img,'',
                        array('width'=>80,'height'=>80)
                        ).Yii::app()->user->name, 'url'=>array('/admin/default')),
                array('label'=>"短信息", 'url'=>array('/admin/message/index'), 'visible'=>!Yii::app()->user->isGuest),

            )));
        ?>
        <?php $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_TABS,
            'stacked' => true,
            'items' =>array(
                array('label'=>'系统信息', 'url'=>array('/admin/default/index'),'action'=>$this->id=='default'),
                array('label'=>'基本配置', 'url'=>'#'),
                array('label'=>'文件管理', 'url'=>array('/admin/upload/admin')),
                array('label'=>'参数管理', 'url'=>array('/admin/config/admin')),
                array('label'=>'信息管理', 'url'=>array('/admin/message/admin')),
                array('label'=>'模块管理', 'url'=>array('/admin/plus/admin')),
                array('label'=>'权限管理', 'url'=>array('/auth')),
                array('label'=>'用户管理', 'url'=>array('/admin/user/admin')),

            )));
        ?>

        <!-- sidebar -->
    </div>


    <div class="span10">
        <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
			'links'=>$this->breadcrumbs,
			'homeLabel'=>'首页',
			'homeUrl'=>$this->createUrl('/admin'),
		)); ?><!-- breadcrumbs -->
        <?php endif?>

        <?php
        $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_TABS,
            'items'=>$this->menu,
        ));
        ?>

        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    </div>
</div>
<?php $this->endContent(); ?>