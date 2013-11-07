<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'defaultController' => 'site/index',
    'name'=>'FirCMS',
    'theme'=>'default',
    'timeZone' => 'Asia/Shanghai',
    // preloading 'log' component
    'preload'=>array('log'),
    'language' => 'zh_cn',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.extensions.debugtoolbar.*',
        'application.widget.*',
    ),
    'timeZone' => 'Asia/Shanghai',
    'preload' => array('log'),
    'modules' => array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'giiadmin',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
        ),
        'rights' => array(
            'debug' => YII_DEBUG,
            //'install'=>true,
            'enableBizRuleData' => true,
            'appLayout' => 'application.modules.admin.views.layouts.main',
        ),
        'admin'=>array('debug'=>YII_DEBUG),
        'b',
    ),
    
    'components' => array(
        'user' => array(
            'loginUrl' => 'site/login',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),



       'phpThumb'=>array(
		 'class'=>'ext.EPhpThumb.EPhpThumb',
		 'options'=>array()
	  ),

        'user' => array(
            'class' => 'RWebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),

        'authManager' => array(
            'class' => 'RDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => '{{authitem}}',
            'itemChildTable' => '{{authitemchild}}',
            'assignmentTable' => '{{authassignment}}',
            'rightsTable' => '{{rights}}',
            'defaultRoles' => array('Guest'),
        ),
        'config' => array(
            'class' => 'application.extensions.EConfig',
            'autoCreateConfigTable' => false,
            'configTableName' => '{{config}}',
            'strictMode' => false,
        ),
        'db' => require(dirname(__FILE__).DIRECTORY_SEPARATOR . 'database.php'),

    
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'XWebDebugRouter',
                    'config' => 'alignLeft, opaque, runInDebug, fixedPos, collapsed',
                    'levels' => 'error, warning, trace, profile, info',
                    'allowedIPs' => array('127.0.0.1'),
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error',
                ),
                // uncomment the following to show log messages on web pages
            /*
                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'error',

                ),
             */
            ),
        ),
     
        
    ),
    'params' => require(dirname(__FILE__).DIRECTORY_SEPARATOR . 'params.php'),
);