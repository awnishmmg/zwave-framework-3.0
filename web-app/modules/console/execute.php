<?php
define('CLI_SYSTEM_PATH',dirname(dirname(__DIR__)));
$require = include_once CLI_SYSTEM_PATH.'/modules/console/require.php';

foreach ($require as $mod_module => $web_modules) {
	foreach ($web_modules as $index => $file) {
			$$file = include_once CLI_SYSTEM_PATH."/{$mod_module}/{$file}.php";
	}
}



