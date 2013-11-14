<?php
/**
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 * @version   globals.php  20:05 2013年11月14日
 */

/*
 * 仅封装过长的函数，尽量让程序保持框架api，不过度封装
 */

defined('DS') or define('DS',DIRECTORY_SEPARATOR);

function dump($var,$depth=10,$highlight=true){
    echo CVarDumper::dumpAsString($var, $depth, $highlight);
}