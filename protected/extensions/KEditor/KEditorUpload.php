<?php

class KEditorUpload extends CAction {

    public function run() {
        $dir = isset($_GET['dir']) ? trim($_GET['dir']) : 'file';
        $ext_arr = array(
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'thumb' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
        );
        if (empty($ext_arr[$dir])) {
            echo CJSON::encode(array('error' => 1, 'message' => '目录名不正确。'));
            exit;
        }
        $originalurl = '';
        $filename = '';
        $date = date('Ymd');
        $id = 0;
        $max_size = 2097152; //2MBs

        $upload_image = CUploadedFile::getInstanceByName('imgFile');

        Yii::import('ext.KEditor.KEditor');
        $upload_dir = KEditor::getUploadPath() . '/' . $dir;
        if (!file_exists($upload_dir))
            mkdir($upload_dir);
        $upload_dir = $upload_dir . '/' . $date;
        if (!file_exists($upload_dir))
            mkdir($upload_dir);
        $upload_url = KEditor::getUploadUrl() . '/' . $dir . '/' . $date;

        if (is_object($upload_image) && get_class($upload_image) === 'CUploadedFile') {
            if ($upload_image->size > $max_size) {
                echo CJSON::encode(array('error' => 1, 'message' => '上传文件大小超过限制。'));
                exit;
            }
            //新文件名
            $filename = date("YmdHis") . '_' . rand(10000, 99999);
            $ext = $upload_image->extensionName;
            if (in_array($ext, $ext_arr[$dir]) === false) {
                echo CJSON::encode(array('error' => 1, 'message' => "上传文件扩展名是不允许的扩展名。\n只允许" . implode(',', $ext_arr[$dir]) . '格式。'));
                exit;
            }

            $uploadfile = $upload_dir . '/' . $filename . '.' . $ext;
            $originalurl = $upload_url . '/' . $filename . '.' . $ext;
            $upload_image->saveAs($uploadfile);
            if ($dir == 'thumb') {
                $thumb_upload_dir = dirname(dirname($upload_dir)) . '/thumb';

                if (!file_exists($thumb_upload_dir))
                    mkdir($thumb_upload_dir);
                $thumb_upload_dir = $thumb_upload_dir . '/' . $date;
                if (!file_exists($thumb_upload_dir))
                    mkdir($thumb_upload_dir);

                $bigimages=dirname(dirname(Yii::app()->basePath)).$originalurl;

                $thumb = Yii::app()->phpThumb->create($bigimages);
                $thumb->resize(Yii::app()->config->get('thumbWidth'),Yii::app()->config->get('thumbHeight'));
                $thumburl = $thumb_upload_dir . '/' . $filename . '.' . $ext;
                $thumb->save($thumburl);

            }

            $upload=new Upload;
            $upload->type=$dir;
            $upload->name=$filename;
            $relativeUploadfile=str_replace(Yii::getPathOfAlias('webroot').DIRECTORY_SEPARATOR,'',$uploadfile);
            if($dir == 'thumb'){
                $upload->path= str_replace('/image/','/thumb/',$relativeUploadfile);
            }else{
                $upload->path=$relativeUploadfile;
            }

            $upload->save();
            echo CJSON::encode(array('error' => 0, 'url' => $originalurl));
        }else {
            echo CJSON::encode(array('error' => 1, 'message' => '未知错误'));
        }
    }

}