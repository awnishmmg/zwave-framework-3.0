<?php

$ENV_BASE_URL = isset($_SERVER['ENV_BASE_URL'])?$_SERVER['ENV_BASE_URL']:'';
$ENV_BOOT_LOADER = isset($_SERVER['ENV_BOOT_LOADER'])?$_SERVER['ENV_BOOT_LOADER']:false;

##################| Environment Global Constants |#######################

define('DOCUMENT_ROOT',dirname(__DIR__));
define('SITE_PATH',$ENV_BASE_URL);
define('ENV_BOOT_LOADER',$ENV_BOOT_LOADER);

##################| Environment Global Constants |#######################



//Save All the Setting
return [

		'constants'=>[

			'APPSESSION_NAME' => 'zwave_session',
			'TIME_ZONE'=>'Asia/Kolkata',

			//Note System Path is for File System or File Handling Stuff
			'SYSTEM_PATH'=>DOCUMENT_ROOT,

			'APP_PATH'=>SITE_PATH,
			'API_PATH'=>'',
			
			'WEB_APP'=>'web-app',
			'ERROR_PATH' =>'../web-app/view/errors/404',

			'ADMIN_PATH'=>SITE_PATH.'admin/',
			'AJAX_PATH'=>SITE_PATH.'ajax/',
			'USER_ASSETS'=>SITE_PATH.'user-assets/',

			//File Uploading Setting
			'FILE_UPLOAD_PATH'=>dirname(__DIR__).'/resources/uploads/',
			'FILE_MAX_SIZE' =>'5',

			//Password Hash
			'PASSWORD_HASH'=>'dbb6638bde150e9371f1e0d30e71aae7',

			// Extensions Helpers path
			'EXTENSION' => DOCUMENT_ROOT.'/helper/extension/',

			//Boot Configuration
			'BOOT_MODE'=> ENV_BOOT_LOADER,
			'BOOT_OUTPUT'=> 'app.console|app.alert|app.screen',
			'BOOT_ALERT'=>'app.console',
			'BOOT_TIMEOUT'=>100,

			//Class Based Default Method
			'DEFAULT_METHOD' =>'index',

			//Admin Credentials default
			'AUTH__ADMIN__CREDENTIALS' => array(
					'username'=>'admin@zwavefoundation.tech',
					'password'=>'zwave@admin'),

			//User Agent Setting
			'USER_AGENT'=>'chrome.exe',
			//Const Definition Setting
			'GLOBAL_DEFINE_PRE' =>'CONST_',

		],

		'database'=>[

			'dbname'=>'zwave_db',
			'host'=>'localhost',
			'db_driver'=>'sqli',
			
			'username'=>'root',
			'password'=>'',
			'port' => 3308,
		],

		'bootPath'=>DOCUMENT_ROOT.'/boot/',

	'assets'=>[
			    'js'=>[
					'jquery.js',
					'myscript.js',
		],
		'css'=>[
			'mystyle.css',
		],
	],

	'app_key'=>'secret_key',
	'app_password'=>'1234', 
	'pass_encrypt' => 'md5',
	'salt_hash' => '!!test^&*#2002@',
];




