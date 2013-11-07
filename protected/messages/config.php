<?php
/**
* @author   poctsy  <poctsy@foxmail.com>
* @copyright Copyright (c) 2013 poctsy
* @link      http://www.fircms.com
* @version   config.php
*/
return array(
    'sourcePath' => dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '..',
    'messagePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',
    'languages' => array('zh_cn', 'en_us'),
    'fileTypes' => array('php'),
    'overwrite' => true,
    'exclude' => array(
        '.svn',
        '.gitignore',
        '/assets',
        '/i18n/data',
        '/attachment',
        '/index.php',
        '/admin.php',
        '/index-test.php',
        '/protected/yiilite.php',
        '/protected/yiit.php',
        '/protected/yiic',
        '/protected/messages',
        '/protected/vendors',
        '/protected/web/js',
        '/protected/tests',
        '/protected/runtime',
        '/protected/framework',
        '/protected/modules/admin',
        '/protected/extensions/giix-core',
        '/protected/extensions/giix-components',
        '/protected/extensions/debugtoolbar',
    ),
);
