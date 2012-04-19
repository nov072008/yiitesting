<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'defaultController' => 'site',
        'name'=>'gRaiders',

	// preloading 'log' component
	'preload'=>array('log',
         'bootstrap', ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*',
                'ext.fileimagebehavior.*',
                'application.modules.rights.*', 
                'application.modules.rights.components.*', //  Yii Rights Correct paths if necessary. ), ......
                    'application.extensions.yiidebugtb.*', //debugger
   
    
        'application.modules.user.models.*',  //THESE are for Yii Users
        'application.modules.user.components.*',
   
    
         
	),

	'modules'=>array(
            
            'user'=>array (
                 'tableUsers' => 'users',
                 'tableProfiles' => 'profiles',
                 'tableProfileFields' => 'profiles_fields',
            ),
    
            'rights'=>array
                  
                    ( 'install'=>false, // Enables the installer.        
            
  ),
        'cal' => array(
     
            'debug' => false // For first run only!
        ),      
            
   
                
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths' => array(
                        'bootstrap.gii', // since 0.9.1    
			'ext.giix-core', // giix generators
                  ),
                    
                        'password'=>'meatmaniac',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','216.49.228.77','*'),
		
		 ),
	),

	// application components
	
    
    
    'components'=>array(
	  'bootstrap'=>array(
        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
),              
        
        'user'=>array(
                   
                    'class'=>'RWebUser', // Allows super users access implicitly.
			// enable cookie-based authentication
			'allowAutoLogin'=>True,
                        'loginUrl' => array('/user/login'),
                    
                
		),
        
        'authManager'=>array( 
                'class'=>'RDbAuthManager', 
                'connectionID'=>'db',
                'defaultRoles'=>array('Authenticated', 'Guest'),
            
            
            
            ),
          
            

//// Provides support authorization item sorting.
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
                        'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                         
			),
		),
 
		
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
                //    ),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=216.49.228.169;dbname=Cody',
			'emulatePrepare' => true,
			'username' => 'merrick',
			'password' => 'meatmaniac',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace',
				),
				
 array( // configuration for the toolbar
          'class'=>'XWebDebugRouter',
          'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
          'levels'=>'error, warning, trace, profile, info',
          'allowedIPs'=>array('127.0.0.1','::1','192.168.1.54','192\.168\.1[0-5]\.[0-9]{3}'),

// uncomment the following to show log messages on web pages
				
				//array(
					//'class'=>'CWebLogRoute',
				//), 
			),	
			  
		),
	), 

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'merrick@ckt.net',
	),),
);

