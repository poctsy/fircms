<?php
class ThumbKEditor extends CWidget{
	/*
	 * TEXTAREA输入框的属性，保证js调用KE失败时，文本框的样式。
	 */
	public $textfieldOptions=array();
        /*
	 * TEXTAREA输入框的属性，保证js调用KE失败时，文本框的样式。
	 */
	public $spanOptions=array();
	/*
	 * 编辑器属性集。
	 */
	public $properties=array();
	/*
	 * TEXTAREA输入框的name，必须设置。
	 * 数据类型：String
	 */
	public $name;
	/*
	 * TEXTAREA的id，可为空
	 */
	public $id;
	
	public $model;
	
	public $baseUrl;
	
	public static function getUploadPath(){
		$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';
		if(isset(Yii::app()->params->uploadPath)){
			return Yii::getPathOfAlias('webroot').str_replace(
								'/',DIRECTORY_SEPARATOR,
								Yii::app()->params->
								uploadPath);
		}
		return Yii::app()->getAssetmanager()
				->getPublishedPath($dir).DIRECTORY_SEPARATOR.'upload';
	}
	
	public static function getUploadUrl(){
		$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';
		if(isset(Yii::app()->params->uploadPath)){
			return Yii::app()->baseUrl.Yii::app()->params->uploadPath;
		}
		return Yii::app()->getAssetManager()->publish($dir).'/upload';
	}
	
	public function init(){
       
		if($this->name===null)
			throw new CException(Yii::t('zii','The id property cannot be empty.'));
			
		$dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'keSource';
		
		$this->baseUrl=Yii::app()->getAssetManager()->publish($dir);
		$cs=Yii::app()->getClientScript();
		$cs->registerCssFile($this->baseUrl.'/themes/default/default.css');
		if(YII_DEBUG) $cs->registerScriptFile($this->baseUrl.'/kindeditor.js');
		else $cs->registerScriptFile($this->baseUrl.'/kindeditor-min.js');
                $cs->registerScriptFile($this->baseUrl.'/lang/'.Yii::app()->language.'.js');
	}
	
	public function run(){
		$cs=Yii::app()->getClientScript();
		$textFieldOptions=$this->gettextfieldOptions();
		$textFieldOptions['name']=CHtml::resolveName($this->model,$this->name);
		$this->id=$textFieldOptions['id']=CHtml::getIdByName($textFieldOptions['name']);
		$activeId=CHtml::activeId($this->model,$this->name);
                $activeclass=$activeId.'_'.get_class($this);
                echo CHtml::activeTextField($this->model,$this->name,$textFieldOptions); 
                echo CHtml::button('选择图片', array('id' => $activeclass."_button")); 
                echo CHtml::openTag("span",array('id'=>$activeclass."_nowimg"));
                echo CHtml::closeTag("span");
                
              
                
		$properties_string = CJavaScript::encode($this->getKeProperties());

		$js=<<<EOF
                        

KindEditor.ready(function(K) {
    var nowimg = K('#{$activeclass}_nowimg');
   
    nowimg.html('<img src=\"' + K('#{$activeId}').val() + '\">');
    K('#{$activeclass}_button').click(function() {
       var editor_$this->id = K.editor(
        $properties_string
         
    );
        editor_$this->id.loadPlugin('thumb', function() {
            editor_$this->id.plugin.thumbDialog({
                showRemote: false,
                clickFn: function(url, title, width, height, border, align) {
                    url = K.formatUrl(url, 'relative');
                    K('#$this->id').val(url);
                    
                    nowimg.html('<img src=\"' + url + '\">');
                    editor_$this->id.hideDialog();
                }
            });
        });

    });
     K('#filemanager').click(function() {
        file_editor.loadPlugin('filemanager', function() {
            file_editor.plugin.filemanagerDialog({
                viewType: 'VIEW',
                dirName: 'file',
                clickFn: function(url, title) {
                    url = K.formatUrl(url, 'relative');
                    K('#Post_file').val(url);
                    editor.hideDialog();
                }
            });
        });
    });

});
EOF;
		$cs->registerScript('KE'.$this->name,$js,CClientScript::POS_HEAD);
	}
	
	public function gettextfieldOptions(){
		//允许获取的属性
		$allowParams=array('size','class','style');
		//准备返回的属性数组
		$params=array();
		foreach($allowParams as $key){
			if(isset($this->textfieldOptions[$key]))
				$params[$key]=$this->textfieldOptions[$key];
		}
		$params['name']=$params['id']=$this->name;
		return $params;
	}
	
	public function getKeProperties(){
		$properties_key=array(
                        'allowFileManager',
			'uploadJson',
                        'langType',
			'extraFileUploadParams',
		);
		
		//准备返回的属性数组
		$params=array();
		foreach($properties_key as $key){
			if(isset($this->properties[$key]))
				$params[$key]=$this->properties[$key];
		}
		return $params;
	}
}