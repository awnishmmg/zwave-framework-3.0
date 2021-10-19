<?php

if(BOOT_MODE==true){
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
	} else {
	$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	if(!get('_bootstatus')=='success' and BOOT_MODE==true){
	//All Setting Related to HTACCESS Has to be Applied
	foreach ($modular as $foldername => $value) {
		#echo SYSTEM_PATH.'/'.$foldername.'/.htaccess'.'<br/>';
			if(!file_exists(SYSTEM_PATH.'/'.$foldername.'/.htaccess')){
				// sleep(200);
				write_htaccess(SYSTEM_PATH.'/'.$foldername.'/.htaccess');
				// echo '<b> * htaccess not found inside '.$foldername.' Root Module  
				// </b>';

			}

		
	}
	//All Setting Related to HTACCESS Has to be Applied
	header('Location: '.$uri.$_SERVER['REQUEST_URI']."?_bootstatus=success");

	}
	if(BOOT_ALERT=='app.alert'){
		echo '<script>window.alert("Application Booted Success-Fully Disable [BOOT_MODE]")</script>';
	}elseif (BOOT_ALERT=='app.console') {
		echo '<script>console.log("Application Booted Success-Fully Disable [BOOT_MODE]")</script>';
	}elseif(BOOT_ALERT=='app.screen'){
		ob_clean();
		echo '<html><head>';
		echo '<script> var i=0;var time='.BOOT_TIMEOUT.';';
		echo 'var ID=setInterval(function(){
			document.write("<b> Wait Booting ..."+i+"<b><hr/>");
			i++;
			if(i==11){
				document.write("Application Booted Success-Fully Disable [BOOT_MODE]");
				clearInterval(ID);
			}
		},time);';
		echo '</script>';
		echo '</head><body></body></html>';

	}

	 foreach ($WebRoutes as $Route => $controller_value){
	 	foreach ($modular as $module_key => $value) {
	 		$exploded_Route = explode("/",$Route);
	 		if($exploded_Route[0]==$module_key){
	 			write_onHtaccess($Route,$controller_value);	
	 		}
	 	}		
	 }

}

function write_htaccess($htaccess_path){
	global $Rules;
	$fp = fopen($htaccess_path,"w+");
	$code = "";
	foreach($Rules as $htaccessRules){
		$code .= "{$htaccessRules} \n";
	}
	fwrite($fp,$code);
}


function write_onHtaccess($Route,$controller){
	global $Rules;
	
	$x_arr=explode('/',$Route);
	$route = $x_arr[1];
	$htaccess_path = SYSTEM_PATH.'/'.$x_arr[0].'/.htaccess';  
	$fp = fopen($htaccess_path,"w+");
	$code = "";

	$controllerName = array_keys($controller);
	$controllerValue = array_values($controller);

$Rules[] = "#### [Custom Route] {$route} Routes for {$controllerName[0]} ### \n\n";
	if($controllerValue[0]=='controller.method'){
$Rules[] = 'RewriteRule ^('.$route.')/([a-zA-Z0-9\-]+)/([a-zA-Z0-9\-/]+)$ '.$controllerName[0].'.php?_method=$2&_values=$3 [L,QSA]';
$Rules[] = 'RewriteRule ^('.$route.')/([a-zA-Z0-9\-]+)$ '.$controllerName[0].'.php?_method=$2 [L,QSA]';
	}elseif($controllerValue[0]=='controller.self'){
		$Rules[] = 'RewriteRule ^('.$route.')$ '.$controllerName[0].'.php [L,QSA]';
	}elseif($controllerValue[0]=='controller.*'){
		$Rules[] = 'RewriteRule ^('.$route.')/([a-zA-Z0-9\-]+)/([a-zA-Z0-9\-/]+)$ '.$controllerName[0].'.php?_method=$2&_values=$3 [L,QSA]';
		$Rules[] = 'RewriteRule ^('.$route.')/([a-zA-Z0-9\-]+)$ '.$controllerName[0].'.php?_method=$2 [L,QSA]';
		$Rules[] = 'RewriteRule ^('.$route.')$ '.$controllerName[0].'.php [L,QSA]';
	}
	

	foreach($Rules as $htaccessRules){
		$code .= "{$htaccessRules} \n";
	}

	fwrite($fp,$code);
}