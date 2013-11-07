<?php
/**
 * @version   FAdminController.php
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
class FAdminController extends Controller {
    private $_postListViews;
    private $_postPageViews;
    private $_postContentViews;
    public function getPostListViews(){

        if($this->_postListViews === NULL){
            return Fircms::getViews('post','list_');
        } else{
            return $this->_postListViews;
        }
    }
    public function getPostPageViews(){

        if($this->_postPageViews === NULL){
            return Fircms::getViews('post','page_');
        } else{
            return $this->_postPageViews;
        }
    }
    public function getPostContentViews(){
        if($this->_postContentViews === NULL){
            return Fircms::getViews('post','content_');
        } else{
            return $this->_postContentViews;
        }
    }

}
