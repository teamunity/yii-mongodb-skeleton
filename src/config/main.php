<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	'name'=>'{{APP_NAME}}',

	// preloading 'log' component
	'preload'=> require_once(__DIR__."/main.preload.php"),

	'behaviors' => require_once(__DIR__."/main.behaviors.php"),

	// autoloading model and component classes
	'import'=>require_once(__DIR__."/main.import.php"),

	'modules'=>require_once(__DIR__."/main.modules.php"),

	// application components like mongodb, db, urlManager etc...
	'components'=>require_once(__DIR__."/main.components.php"),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=> require_once(__DIR__."/main.params.php"),

);