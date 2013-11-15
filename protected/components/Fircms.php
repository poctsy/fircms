<?php
//公用函数
/**
 * @version   Fircms.php
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
class Fircms extends CComponent{

    const VERSION = 'FirCMS1.0';


//获取views下的视图跟theme下视图
    public function getViews($modules,$select='no') {
//获取views视图
        $selectArray=array();
        if(is_dir($dir=Yii::app()->viewPath.DIRECTORY_SEPARATOR.$modules)){
            $viewsArray = scandir($dir);
            foreach( $viewsArray as $value){
                if($select !='no'){
                    //将包含视图指定前缀的文件加入数组
                    if(strstr($value,$select) != NULL){
                        //去除后缀
                        $value = substr($value, 0, -4);
                        $selectArray[]=$value;
                    }
                }else{
                    //将不是'.' '..' 的文件加入数组
                    if($value != '.' && $value != '..' ){
                        $value = substr($value, 0, -4);
                        $selectArray[]=$value;
                    }
                }
            }
        }
//获取theme下视图
        if(Yii::app()->theme !=NULL && is_dir($dir=Yii::app()->theme->basePath.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$modules)){
            $themeViewsArray = scandir($dir);
            foreach( $themeViewsArray as $value){
                if($select !='no'){
                    if(strstr($value,$select) != NULL){
                        $value = substr($value, 0, -4);
                        $selectArray[]=$value;
                    }
                }else{
                    if($value != '.' && $value != '..' ){
                        $value = substr($value, 0, -4);
                        $selectArray[]=$value;
                    }
                }
            }
        }

        //返回去除重复键值的数组
        return array_unique($selectArray);

    }


    public static function truncate_utf8_string($string, $length, $etc = '...') {
        $result = '';
        $string = html_entity_decode(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
        $strlen = strlen($string);
        for ($i = 0; (($i < $strlen) && ($length > 0)); $i++) {
            if ($number = strpos(str_pad(decbin(ord(substr($string, $i, 1))), 8, '0', STR_PAD_LEFT), '0')) {
                if ($length < 1.0) {
                    break;
                }
                $result .= substr($string, $i, $number);
                $length -= 1.0;
                $i += $number - 1;
            } else {
                $result .= substr($string, $i, 1);
                $length -= 0.5;
            }
        }
        $result = htmlspecialchars($result, ENT_QUOTES, 'UTF-8');
        if ($i < $strlen) {
            $result .= $etc;
        }
        return $result;
    }

    public static function array_remove($array, $v) {
        unset($array[$v]);
        return $array;
    }

    public static function ip($str) {
        $ip = explode('.', $str);
        return $ip[0] . '.' . $ip[1] . '.' . $ip[2] . '.*';
    }

    public static function date($format, $time) {
        $limit = time() - $time;

        if ($limit < 10)
            return '刚刚';

        if ($limit < 60)
            return $limit . '秒前';

        if ($limit >= 60 && $limit < 3600)
            return floor($limit / 60) . '分钟前';

        if ($limit >= 3600 && $limit < 86400)
            return floor($limit / 3600) . '小时前';

        if ($limit >= 86400 and $limit < 259200)
            return floor($limit / 86400) . '天前';

        if ($limit >= 259200)
            return date($format, $time);
    }

    public static function dialog($title, $message, $id = 0) {
        if ($id == 0)
            $id = rand(1, 999999);
        Yii::app()->user->setflash($id, array('title' => $title, 'content' => $message));
    }

    public static function getAvatar($user_id, $size = 'middle') {
        $size = in_array($size, array('big', 'middle', 'small')) ? $size : 'middle';
        $uid = abs(intval($user_id));
        $uid = sprintf("%09d", $uid);
        $dir1 = substr($uid, 0, 3);
        $dir2 = substr($uid, 3, 2);
        $dir3 = substr($uid, 5, 2);
        $avatar = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . substr($uid, -2) . "_avatar_$size.jpg";

        if (file_exists(Yii::app()->basePath . '/../uploads/avatar/' . $avatar))
            return CHtml::image(Yii::app()->baseUrl . '/uploads/avatar/' . $avatar, $user_id, array('class' => 'avatar-' . $size));
        else
            return CHtml::image(Yii::app()->baseUrl . '/images/noavatar_' . $size . '.gif', $user_id, array('class' => 'avatar-' . $size));
    }

    public static function sendMail($to, $subject, $message) {
        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
        $mailer->Host = 'smtp.exmail.qq.com';
        $mailer->IsSMTP();
        $mailer->IsHTML();
        $mailer->SMTPAuth = true;
        $mailer->From = Yii::app()->params['adminEmail'];
        $mailer->AddReplyTo(Yii::app()->params['adminEmail']);
        $mailer->AddAddress($to);
        $mailer->FromName = 'Yii ';
        $mailer->Username = 'admin@admin.com';
        $mailer->Password = 'xxx';
        $mailer->CharSet = 'UTF-8';
        $mailer->Subject = $subject;
        $mailer->Body = $message;
        $mailer->Send();
    }

    public static function ubbEncode($str) {
        $str = str_replace("<", '&lt;', $str);
        $str = str_replace(">", '&gt;', $str);
        $str = str_replace("\n", '<br />', $str);
        return $str;
    }

    public static function ubb2html($sUBB) {
        $sHtml = $sUBB;

        global $emotPath, $cnum, $arrcode, $bUbb2htmlFunctionInit;
        $cnum = 0;
        $arrcode = array();
        $emotPath = '../xheditor_emot/';

        if (!$bUbb2htmlFunctionInit) {

            function saveCodeArea($match) {
                global $cnum, $arrcode;
                $cnum++;
                $arrcode[$cnum] = $match[0];
                return "[\tubbcodeplace_" . $cnum . "\t]";
            }

        }
        $sHtml = preg_replace_callback('/\[code\s*(?:=\s*((?:(?!")[\s\S])+?)(?:"[\s\S]*?)?)?\]([\s\S]*?)\[\/code\]/i', 'saveCodeArea', $sHtml);

        $sHtml = preg_replace("/&/", '&amp;', $sHtml);
        $sHtml = preg_replace("/</", '&lt;', $sHtml);
        $sHtml = preg_replace("/>/", '&gt;', $sHtml);
        $sHtml = preg_replace("/\r?\n/", '<br />', $sHtml);

        $sHtml = preg_replace("/\[(\/?)(b|u|i|s|sup|sub)\]/i", '<$1$2>', $sHtml);
        $sHtml = preg_replace('/\[color\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]/i', '<span style="color:$1;">', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getSizeName($match) {
                $arrSize = array('10px', '13px', '16px', '18px', '24px', '32px', '48px');
                if (preg_match("/^\d+$/", $match[1]))
                    $match[1] = $arrSize[$match[1] - 1];
                return '<span style="font-size:' . $match[1] . ';">';
            }

        }
        $sHtml = preg_replace_callback('/\[size\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]/i', 'getSizeName', $sHtml);
        $sHtml = preg_replace('/\[font\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]/i', '<span style="font-family:$1;">', $sHtml);
        $sHtml = preg_replace('/\[back\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]/i', '<span style="background-color:$1;">', $sHtml);
        $sHtml = preg_replace("/\[\/(color|size|font|back)\]/i", '</span>', $sHtml);

        for ($i = 0; $i < 3; $i++)
            $sHtml = preg_replace('/\[align\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\](((?!\[align(?:\s+[^\]]+)?\])[\s\S])*?)\[\/align\]/', '<p align="$1">$2</p>', $sHtml);
        $sHtml = preg_replace('/\[img\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*?)?\s*\[\/img\]/i', '<img src="$1" alt="" />', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getImg($match) {
                $alt = $match[1];
                $p1 = $match[2];
                $p2 = $match[3];
                $p3 = $match[4];
                $src = $match[5];
                $a = $p3 ? $p3 : (!is_numeric($p1) ? $p1 : '');
                return '<img src="' . $src . '" alt="' . $alt . '"' . (is_numeric($p1) ? ' width="' . $p1 . '"' : '') . (is_numeric($p2) ? ' height="' . $p2 . '"' : '') . ($a ? ' align="' . $a . '"' : '') . ' />';
            }

        }
        $sHtml = preg_replace_callback('/\[img\s*=([^,\]]*)(?:\s*,\s*(\d*%?)\s*,\s*(\d*%?)\s*)?(?:,?\s*(\w+))?\s*\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*)?\s*\[\/img\]/i', 'getImg', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getEmot($match) {
                global $emotPath;
                $arr = split(',', $match[1]);
                if (!isset($arr[1])) {
                    $arr[1] = $arr[0];
                    $arr[0] = 'default';
                }
                $path = $emotPath . $arr[0] . '/' . $arr[1] . '.gif';
                return '<img src="' . $path . '" alt="' . $arr[1] . '" />';
            }

        }
        $sHtml = preg_replace_callback('/\[emot\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\/\]/i', 'getEmot', $sHtml);
        $sHtml = preg_replace('/\[url\]\s*(((?!")[\s\S])*?)(?:"[\s\S]*?)?\s*\[\/url\]/i', '<a href="$1">$1</a>', $sHtml);
        $sHtml = preg_replace('/\[url\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]\s*([\s\S]*?)\s*\[\/url\]/i', '<a href="$1">$2</a>', $sHtml);
        $sHtml = preg_replace('/\[email\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*?)?\s*\[\/email\]/i', '<a href="mailto:$1">$1</a>', $sHtml);
        $sHtml = preg_replace('/\[email\s*=\s*([^\]"]+?)(?:"[^\]]*?)?\s*\]\s*([\s\S]+?)\s*\[\/email\]/i', '<a href="mailto:$1">$2</a>', $sHtml);
        $sHtml = preg_replace("/\[quote\]/i", '<blockquote>', $sHtml);
        $sHtml = preg_replace("/\[\/quote\]/i", '</blockquote>', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getFlash($match) {
                $w = $match[1];
                $h = $match[2];
                $url = $match[3];
                if (!$w)
                    $w = 480;if (!$h)
                    $h = 400;
                return '<embed type="application/x-shockwave-flash" src="' . $url . '" wmode="opaque" quality="high" bgcolor="#ffffff" menu="false" play="true" loop="true" width="' . $w . '" height="' . $h . '" />';
            }

        }
        $sHtml = preg_replace_callback('/\[flash\s*(?:=\s*(\d+)\s*,\s*(\d+)\s*)?\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*?)?\s*\[\/flash\]/i', 'getFlash', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getMedia($match) {
                $w = $match[1];
                $h = $match[2];
                $play = $match[3];
                $url = $match[4];
                if (!$w)
                    $w = 480;if (!$h)
                    $h = 400;
                return '<embed type="application/x-mplayer2" src="' . $url . '" enablecontextmenu="false" autostart="' . ($play == '1' ? 'true' : 'false') . '" width="' . $w . '" height="' . $h . '" />';
            }

        }
        $sHtml = preg_replace_callback('/\[media\s*(?:=\s*(\d+)\s*,\s*(\d+)\s*(?:,\s*(\d+)\s*)?)?\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*?)?\s*\[\/media\]/i', 'getMedia', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getTable($match) {
                return '<table' . (isset($match[1]) ? ' width="' . $match[1] . '"' : '') . (isset($match[2]) ? ' bgcolor="' . $match[2] . '"' : '') . '>';
            }

        }
        $sHtml = preg_replace_callback('/\[table\s*(?:=(\d{1,4}%?)\s*(?:,\s*([^\]"]+)(?:"[^\]]*?)?)?)?\s*\]/i', 'getTable', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getTR($match) {
                return '<tr' . (isset($match[1]) ? ' bgcolor="' . $match[1] . '"' : '') . '>';
            }

        }
        $sHtml = preg_replace_callback('/\[tr\s*(?:=(\s*[^\]"]+))?(?:"[^\]]*?)?\s*\]/i', 'getTR', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getTD($match) {
                $col = isset($match[1]) ? $match[1] : 0;
                $row = isset($match[2]) ? $match[2] : 0;
                $w = isset($match[3]) ? $match[3] : null;
                return '<td' . ($col > 1 ? ' colspan="' . $col . '"' : '') . ($row > 1 ? ' rowspan="' . $row . '"' : '') . ($w ? ' width="' . $w . '"' : '') . '>';
            }

        }
        $sHtml = preg_replace_callback("/\[td\s*(?:=\s*(\d{1,2})\s*,\s*(\d{1,2})\s*(?:,\s*(\d{1,4}%?))?)?\s*\]/i", 'getTD', $sHtml);
        $sHtml = preg_replace("/\[\/(table|tr|td)\]/i", '</$1>', $sHtml);
        $sHtml = preg_replace("/\[\*\]((?:(?!\[\*\]|\[\/list\]|\[list\s*(?:=[^\]]+)?\])[\s\S])+)/i", '<li>$1</li>', $sHtml);
        if (!$bUbb2htmlFunctionInit) {

            function getUL($match) {
                $str = '<ul';
                if (isset($match[1]))
                    $str.=' type="' . $match[1] . '"';
                return $str . '>';
            }

        }
        $sHtml = preg_replace_callback('/\[list\s*(?:=\s*([^\]"]+))?(?:"[^\]]*?)?\s*\]/i', 'getUL', $sHtml);
        $sHtml = preg_replace("/\[\/list\]/i", '</ul>', $sHtml);
        $sHtml = preg_replace("/\[hr\/\]/i", '<hr />', $sHtml);

        for ($i = 1; $i <= $cnum; $i++)
            $sHtml = str_replace("[\tubbcodeplace_" . $i . "\t]", $arrcode[$i], $sHtml);

        if (!$bUbb2htmlFunctionInit) {

            function fixText($match) {
                $text = $match[2];
                $text = preg_replace("/\t/", '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $text);
                $text = preg_replace("/ /", '&nbsp;', $text);
                return $match[1] . $text;
            }

        }
        $sHtml = preg_replace_callback('/(^|<\/?\w+(?:\s+[^>]*?)?>)([^<$]+)/i', 'fixText', $sHtml);

        if (!$bUbb2htmlFunctionInit) {

            function showCode($match) {
                $match[1] = strtolower($match[1]);
                if (!$match[1])
                    $match[1] = 'plain';
                $match[2] = preg_replace("/</", '&lt;', $match[2]);
                $match[2] = preg_replace("/>/", '&gt;', $match[2]);
                return '<pre class="prettyprint lang-' . $match[1] . '">' . $match[2] . '</pre>';
            }

        }
        $sHtml = preg_replace_callback('/\[code\s*(?:=\s*((?:(?!")[\s\S])+?)(?:"[\s\S]*?)?)?\]([\s\S]*?)\[\/code\]/i', 'showCode', $sHtml);

        if (!$bUbb2htmlFunctionInit) {

            function showFlv($match) {
                $w = $match[1];
                $h = $match[2];
                $url = $match[3];
                if (!$w)
                    $w = 480;if (!$h)
                    $h = 400;
                return '<embed type="application/x-shockwave-flash" src="mediaplayer/player.swf" wmode="transparent" allowscriptaccess="always" allowfullscreen="true" quality="high" bgcolor="#ffffff" width="' . $w . '" height="' . $h . '" flashvars="file=' . $url . '" />';
            }

        }
        $sHtml = preg_replace_callback('/\[flv\s*(?:=\s*(\d+)\s*,\s*(\d+)\s*)?\]\s*(((?!")[\s\S])+?)(?:"[\s\S]*?)?\s*\[\/flv\]/i', 'showFlv', $sHtml);

        $bUbb2htmlFunctionInit = true;

        return $sHtml;
    }

    public static function makeSerialize($string) {
        $array_a = array();
        $array_a = explode(",", $string);
        foreach ($array_a as $array_b) {
            $array_c[] = explode("|", $array_b);
        }
        return serialize($array_c);
    }



    public static function formatFileUrl($fileUrl)
    {
        if (preg_match('/^http:\/\//', $fileUrl) > 0) return $fileUrl;

        $baseUrl = Yii::app()->baseUrl;
        if (preg_match('/^\//', $fileUrl) == 0 && preg_match('/\/$/', $baseUrl) == 0) $baseUrl .= '/';

        return $baseUrl . $fileUrl;
    }

    public static function createFile($upload,$type,$act,$imgurl='',$tembsize=array()){
        if(isset(Yii::app()->params->uploadPath)){
            $tempPath=Yii::app()->params->uploadPath;
        }else{
            $tempPath='upload';
        }

        if(!empty($imgurl)&&$act==='update'){
            $deleteFile=Yii::app()->basePath.'/../'.$imgurl;
            if(is_file($deleteFile))
                unlink($deleteFile);
        }
        $uploadDir=Yii::app()->basePath.'/../'.$tempPath.'/'.$type.'/'.date('Ymd');
        self::recursionMkDir($uploadDir);
        $imgname=date("YmdHis") . '_' . rand(10000, 99999).'.'.$upload->extensionName;
        //图片存储路径
        $imageurl=$tempPath.'/'.$type.'/'.date('Ymd').'/'.$imgname;
        //存储绝对路径
        $uploadPath=$uploadDir.'/'.$imgname;


        if($upload->saveAs($uploadPath)){
            if(count($tembsize)==2 ){
                $thumb = Yii::app()->phpThumb->create($uploadPath);
                $thumb->resize($tembsize[0],$tembsize[1]);
                $thumb->save($uploadPath);
            }
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

    //判断头像图片位置，是否允许远程图片
    public static function formatUserImg($user_img){
        //如果图片不存在显示默认的none.png

        if(!$user_img){
            $user_imgUrl=Yii::app()->baseUrl.DS.'static'.DS.'img'.DS.'none.png';
        }else{
//查看是否为自带系统头像,用户上传的头像的图片名字是加了日期，所以不会跟系统头像名字重复
            if(file_exists(dirname(Yii::app()->basePath.DS).DS.'static'.DS.'img'.DS.$user_img)){
                $user_imgUrl=Yii::app()->baseUrl.DS.'static'.DS.'img'.DS.$user_img;
            }elseif(file_exists(dirname(Yii::app()->basePath).DS.Yii::app()->params->uploadPath.DS.'img'.DS.$user_img)){
                $user_imgUrl=Yii::app()->baseUrl.DS.Yii::app()->params->uploadPath.DS.'img'.DS.$user_img;
//是否允许远程图片，默认关闭
            }elseif(Yii::app()->params->remoteUserImg){
                $user_imgUrl=$user_img;

            }else{
                $user_imgUrl=Yii::app()->baseUrl.DS.'static'.DS.'img'.DS.'none.png';
            }

        }

        return $user_imgUrl;
    }


}











 

 