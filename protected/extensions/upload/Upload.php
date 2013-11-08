<?php
/**
 * $upload: CUploadedFile::getInstance;
 * $type:  artilce product
 * $act:  create update
 * $imgurl:  delete old imgurl when update
 */
class Upload{

	public static function createFile($upload,$type,$act,$imgurl=''){
		if(!empty($imgurl)&&$act==='update'){
			$deleteFile=Yii::app()->basePath.'/../'.$imgurl;
			if(is_file($deleteFile))
				unlink($deleteFile);
		}
		$uploadDir=Yii::app()->basePath.'/../uploads/'.$type.'/'.date('Y-m',time());
		self::recursionMkDir($uploadDir);
		$imgname=time().'-'.rand().'.'.$upload->extensionName;
		//图片存储路径
		$imageurl='/uploads/'.$type.'/'.date('Y-m',time()).'/'.$imgname;
		//存储绝对路径
		$uploadPath=$uploadDir.'/'.$imgname;
		if($upload->saveAs($uploadPath)){
			return $imageurl;
		}else{
			return null;
		}
	}
	private static function recursionMkDir($dir){
		if(!is_dir($dir)){
			if(!is_dir(dirname($dir))){
				self::recursionMkDir(dirname($dir));
				mkdir($dir,'0777');
			}else{
				mkdir($dir,'0777');
			}
		}
	}
}