<?php
/**
 * @version   FActiveRecord.php
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
class FActiveRecord extends CActiveRecord{




    public function contentPurify($value) {
        $p = new CHtmlPurifier();
        $cleanHtml = $p->purify($value);
        return $cleanHtml;
    }
    public function Purify($value) {
        $p = new CHtmlPurifier();
        $p->options = array('HTML.Allowed' => 'strong,em,u,h1,h2,h3,h4');
        $cleanHtml = $p->purify($value);
        return $cleanHtml;
    }
}