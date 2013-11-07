<?php
/**
 * @version   FController.php
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
class FController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to 'column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $items=array();
    public $layout = '//layouts/column1';

    public function init(){
       //  判断是否自定义了主题
        if($theme=Yii::app()->params['theme'] != 'default' && Yii::app()->params['theme'] !=NULL)
        Yii::app()->setTheme($theme);
    }




}
