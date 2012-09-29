<?php
return array(
	'mongodb' => array(
            'class' => 'EMongoDB',
            'connectionString' => 'mongodb://{{MONGO_HOST}}' ,
            'dbName' => '{{MONGO_DB}}',
            'fsyncFlag' => true,
            'safeFlag' => true,
            'useCursor' => false
        ),

	 'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => '/login',
        ),
	  'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'gii' => 'gii',
                'gii/<controller:\w+>' => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'logout' => 'login/logout',
            ),
        ),
	   'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning, info',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
	      'errorHandler' => array(
            'errorAction' => 'site/error',
        ),

);