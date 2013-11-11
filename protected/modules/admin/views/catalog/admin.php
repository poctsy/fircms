<?php
/* @var $this CatalogController */
/* @var $model Catalog */

$this->breadcrumbs = array(
    '栏目'=>array('catalog/admin'),
    '管理栏目',
);

$this->menu = array(
    array('label' =>  '添加栏目', 'url' => array('create')),
    array('label'=>'管理栏目', 'url'=>array('admin')),

);
$cs1 = Yii::app()->getClientScript();
$cs1->registerCoreScript('jquery');
$cs1->registerScriptFile( Yii::app()->getModule('admin')->getAssetsUrl() . '/js/lib/jquery.treeview/jquery.treeview.js');
$cs1->registerScriptFile( Yii::app()->getModule('admin')->getAssetsUrl(). '/js/lib/jquery.cookie.js');
$cs1->registerCssFile( Yii::app()->getModule('admin')->getAssetsUrl() . '/js/lib/jquery.treeview/jquery.treeview.css' );
$cs1->registerCssFile( Yii::app()->getModule('admin')->getAssetsUrl() . '/css/f-treeview.css' );
$csrfTokenName = Yii::app()->request->csrfTokenName;
$csrfToken = Yii::app()->request->csrfToken;

Yii::app()->clientScript->registerScript('admin', "


$('#catalogtree').treeview({
		animated: 'fast',
		collapsed: true,
		unique: true,
		persist: 'cookie',
		toggle: function() {
			window.console && console.log('%o was toggled', this);
		}
});

jQuery(document).on('click','#catalogtree a.delete',function() {
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
?>


<div id="catalogtree">
    <div><?php Catalog::printTree(); ?></div>
</div>

