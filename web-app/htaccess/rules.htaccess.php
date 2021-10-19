<?php

require_once __DIR__.'/'.'modes.htaccess.php';

$Rules[0] = "RewriteEngine {$setModes['RewriteEngine']}";
$Rules[1] = "# {$setModes['Comment_1']}";
$Rules[2] = "php_value include_path '{$setModes['include_path']}'";
$Rules[3] =  "DirectoryIndex {$setModes['DirectoryIndex']}";
$Rules[4] = "# {$setModes['Comment_2']}";
$Rules[4] = "Options {$setModes['Options_index']}";






