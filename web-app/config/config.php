<?php
if (!defined('autoloading')) define('autoloading',TRUE);

$autoload['define']=array('lang','error','footer');

$autoload['config']=array('init','database','define','loader','root/web-routes',
	'controller');

$autoload['library'] =array('query-builder.class','relationship.class','design.class','model-loader.class','encryption.class','pagination/pagination.class','validation.class');

#Helpers Loaders

$autoload['helper'] =array('debugger','ajax','uri_segment','htaccess',
	'json','date','ui','lexical','download','file','flash','uploads'); #_helper

$autoload['model'] = array(); #_model
$autoload['functions'] = array('timestamp','errors','functions','flash','bread_crumbs'); #_model

$autoload['htaccess'] = array('rules.htaccess'); #_model
// $autoload['package']=array('xls-to-csv');

$db['prefix'] = 'tbl_';

#All the modular projects projects

$modular['admin']='admin';
$modular['ajax']='ajax';
#$modular['api']='api';
$modular['user']='user';

#Add the Code Snippet
#$autoload['snippet']=array('code');

?>