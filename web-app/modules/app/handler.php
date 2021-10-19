<?php
startSection();

$uri = trim($_SERVER['REQUEST_URI'],'/');
$uri_Segment = count(explode('/',$uri));
if($uri_Segment>=3){

	$Route_uri = trim(Request::param(1,true).'/'.Request::param(2,true).'/'.Request::param(3,true),'/');

}elseif($uri_Segment==2){

	$Route_uri = trim(Request::param(1,true).'/'.Request::param(2,true).'/','/');

}elseif($uri_Segment==1){
	
	$Route_uri = trim(Request::param(1,true).'/','/');
}


$Controller_Array = $WebRoutes[$uri];
$Controller_PathName = array_keys($Controller_Array)[0];
$route_key = Request::param(1,true).'::'.$Controller_PathName;
$Controller_ApiType = array_values($Controller_Array)[0]; 

$returnTypeOfControllerApiType = array('controller.*'=>['_method','_values'],'controller.method'=>['_method'],'controller.self'=>[]);

$Routes_arr=[];
prx($route_key,false);
prx($Controller_PathName,false);
prx($Controller_ApiType,false);
prx($returnTypeOfControllerApiType,false);
prx($Routes_arr,false);

endSection();