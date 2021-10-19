<?php

########### Controller Handler Class For Handling Class Based Controller #####
if(class_exists(basename($_SERVER['SCRIPT_NAME'],'.php'))):
############ Check if Class has defined or Not ###########################
##########| If you are Using Class Based Controller then index Method is By Default Called ####
if(is_null(get('_method'))){
	$_GET['_method']=DEFAULT_METHOD;
}

Request::method(get('_method'),function(){
	global $controllerRoute;
	$ClassName = basename($_SERVER['SCRIPT_NAME'],'.php');
	$object = new $ClassName();
	try{
	$call = $controllerRoute[Request::get()][Request::param(2,false).'/'.get('_method')];
	if(!method_exists($object, $call)){
	    throw new Exception;
	}
	call_user_func_array(array($object,$call),explode('/',get('_values')));
	}catch(Exception $e){
		echo '<pre>';
		echo("<h4> {$call}() Method Does not Exist in In {$ClassName} </h4>");
		echo $e->getTraceAsString();
		echo $e->getMessage();
		echo debug_print_backtrace();
		echo "Total Memory Used To Handle Exception ".memory_get_peak_usage()." Bytes On #Stack on Line ".__LINE__;
		echo '<pre>';
		exit;

	}

	// $object->$call($n);
############ Check if Class has defined or Not ###########################
});

endif;
########### Controller Handler Class For Handling Class Based Controller #####
?>