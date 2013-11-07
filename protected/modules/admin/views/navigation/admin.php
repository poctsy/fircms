<?php
/* @var $this NavigationController */
/* @var $model Navigation */

$this->breadcrumbs = array(
    '导航'=>array('admin'),
    '管理导航',
);

$this->menu = array(
    array('label' =>"创建导航", 'url' => array('create')),
    array('label' =>"绑定资源", 'url' => array('createchild')),
    array('label' =>"管理导航", 'url' => array('admin')),
);
$cs1 = Yii::app()->getClientScript();
$cs1->registerCoreScript('jquery');
$cs1->registerScriptFile( Yii::app()->getModule('admin')->getAssetsUrl(). '/js/lib/jquery.treeview/jquery.treeview.js');
$cs1->registerScriptFile( Yii::app()->getModule('admin')->getAssetsUrl(). '/js/lib/jquery.cookie.js');
$cs1->registerCssFile( Yii::app()->getModule('admin')->getAssetsUrl() . '/js/lib/jquery.treeview/jquery.treeview.css');

$csrfTokenName = Yii::app()->request->csrfTokenName;
$csrfToken = Yii::app()->request->csrfToken;

Yii::app()->clientScript->registerScript('admin', "
    
$('#navigationtree').treeview({
		animated: 'fast',
		collapsed: true,
		unique: true,
		persist: 'cookie',
		toggle: function() {
			window.console && console.log('%o was toggled', this);
		}
});

jQuery(document).on('click','#navigationtree a.delete',function() {
	if(!confirm('确定要删除这条数据吗?')) return false;
	var th = this,
		afterDelete = function(){};
	        $.ajax({
	        type: 'POST',
		url: jQuery(this).attr('href'),
                data:{ '$csrfTokenName':'$csrfToken' },
		error: function() {
			location.reload();
		},
                success:function(){
                location.reload();
                 }
	});
	return false;
});
");



//$a=Navigation::model()->findByPk(172);
//$b=Navigation::model()->findByPk(173);
//$b->moveAsFirst($a);      
?>


<div id="navigationtree" >
    <div><?php Navigation::printTree(); ?></div>
</div>

