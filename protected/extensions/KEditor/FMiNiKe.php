<?php
class FMiNiKe extends CWidget
{
    public $baseUrl;
    public $model;
    public $name;
    public function init()
    {
        if($this->name===null)
            throw new CException(Yii::t('zii','The id property cannot be empty.'));

        $dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';

        $this->baseUrl=Yii::app()->getAssetManager()->publish($dir);
        $cs=Yii::app()->getClientScript();
        $cs->registerCssFile($this->baseUrl.'/themes/default/default.css');
        if(YII_DEBUG) $cs->registerScriptFile($this->baseUrl.'/kindeditor.js');
        else $cs->registerScriptFile($this->baseUrl.'/kindeditor-min.js');

$js=<<<EOF
KindEditor.ready(function(K) {

    K.each({
        'plug-align': {
            name: '对齐方式',
            method: {
                'justifyleft': '左对齐',
                'justifycenter': '居中对齐',
                'justifyright': '右对齐'
            }
        },
        'plug-order': {
            name: '编号',
            method: {
                'insertorderedlist': '数字编号',
                'insertunorderedlist': '项目编号'
            }
        },
        'plug-indent': {
            name: '缩进',
            method: {
                'indent': '向右缩进',
                'outdent': '向左缩进'
            }
        }
    }, function(pluginName, pluginData) {
        var lang = {};
        lang[pluginName] = pluginData.name;
        KindEditor.lang(lang);
        KindEditor.plugin(pluginName, function(K) {
            var self = this;
            self.clickToolbar(pluginName, function() {
                var menu = self.createMenu({
                    name: pluginName,
                    width: pluginData.width || 100
                });
                K.each(pluginData.method, function(i, v) {
                    menu.addItem({
                        title: v,
                        checked: false,
                        iconClass: pluginName + '-' + i,
                        click: function() {
                            self.exec(i).hideMenu();
                        }
                    });
                })
            });
        });
    });
    K.create('#contentqq', {

        themeType: 'qq',
        items: [
            'bold', 'italic', 'underline', 'fontname', 'fontsize', 'forecolor', 'hilitecolor', 'plug-align', 'plug-order', 'plug-indent', 'link'
        ]
    });
});


EOF;


        Yii::app()->getClientScript()->registerScript('FMiNiKe',$js);
    }

    public function run()
    {
      echo CHtml::activeTextarea($this->model, 'content', array(
    'id' => 'contentqq',
    'style' => 'width:100%;height:300px;visibility:hidden;'
));


}



}