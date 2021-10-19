<?php
	
return [
		
	  'prepend_keys'=>['header','request','boot','session','config','binding'],
	  'append_keys'=>['controller','footer'],
		
	  'disallow_keys'=>[

		'ajax'=> array('template_header','binding','template_footer'),
		'api'=> array('template_header','binding','template_footer'),

		],

		'config'=>dirname(__DIR__).'/config/autoloader.php',
		'request'=>dirname(__DIR__).'/config/request_handler.php',
		// Boot Setting File
		'boot'=>dirname(__DIR__).'/boot/index.php',
		// Boot Setting File
		'session'=>dirname(__DIR__).'/config/session_handler.php',
		'binding'=>dirname(__DIR__).'/hooks/binding.php',
		'header'=>dirname(__DIR__).'/view/template_header.php',
		'controller'=>dirname(__DIR__).'/config/controller_handler.php',
		'footer'=>dirname(__DIR__).'/view/template_footer.php',

];




