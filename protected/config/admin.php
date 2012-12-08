<?php

return array(
    'theme' => 'bootstrap',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'controllerPath' => dirname(dirname(__FILE__)) . '/admin/controllers',
    'viewPath' => dirname(dirname(__FILE__)) . '/admin/views',
    'name' => '个人网站',
    'defaultController' => 'index',
    // preloading 'log' component
    'preload' => array('log'),
    'language' => 'zh_cn',
    'timeZone' => 'Asia/Shanghai',
    'charset' => 'utf-8',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'.',
            // 'ipFilters'=>array('127.0.0.1'),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
            'generatorPaths'=>array(
                'application.gii'
            ),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'class' => 'WebUser',
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'get',
            'showScriptName' => true,
        ),
        'format' => array(
            'class' => 'CFormatter',
            'datetimeFormat' => 'Y-m-d H:i',
        ),
        // uncomment the following to use a MySQL database
        'db' => include dirname(__FILE__) . '/db.php',
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
    ),
    'params' => include dirname(__FILE__) . '/params.php',
);
