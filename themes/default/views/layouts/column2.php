<?php /* @var $this Controller */ ?>
<?php $this->beginContent('application.modules.admin.views.layouts.main'); ?>

    <div class="span2 bs-docs-sidebar">
        <?php
        $this->widget('bootstrap.widgets.TbNav', array(
            'stacked' => true,
            'type' => TbHtml::NAV_TYPE_TABS,
            'items'=>$this->menu,
        ));
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
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>

<?php $this->endContent(); ?>