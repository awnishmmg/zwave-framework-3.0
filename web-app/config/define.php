<?php

// donot modify the file

foreach($define as $names => $constants):
	
	foreach($constants as $index => $value):

		define(GLOBAL_DEFINE_PRE.strtoupper(basename(basename($names),'.php'))."_".strtoupper($index),$value);

	endforeach;

endforeach;