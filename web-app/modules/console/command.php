<?php

Class Command{

// Command function to Accept the Password 
public function secret( $prompt ) {
	echo $prompt;
	echo "\033[30;40m";  // black text on black background
	$input = fgets(STDIN);
	echo "\033[0m";      // reset
	return rtrim( $input,"\n\r");
}

// Command Function to Accept the Input Function 
public function input($message){
	echo $message;
	$input = fgets(STDIN,10000);
	return trim($input,"\n\r");
}

public function confirm($prompt){
	$response = strtolower($this->input("{$prompt} [y|n] :"));
	if($response == 'y'){
		return true;
	}else{
		return false;
	}

}

public function getAllCommands(){
	$commands_dir = scandir(CLI_SYSTEM_PATH.'/modules/console/command');
	unset($commands_dir[0],$commands_dir[1]);
	return $commands_dir;
}

public function getAllroutes(){

	$commands_routes = file_get_contents(CLI_SYSTEM_PATH.'/config/routes.php');
	return $commands_routes;

}


public function select($prompt,$options){

	$response = strtolower($this->output($prompt.PHP_EOL));

	foreach ($options as $index => $value){
		$this->output("\t",($index+1),":",$value,PHP_EOL);
	}
	
	$options[]='exit';
	while(true){

	   $response = $this->input("Enter Option:[option|exit]:");
		if(in_array($response,$options)){
			if(strtolower($response) == 'exit'){
				return false;
			}else{
				return $response;
			}
		}else{

			$this->output($response,' Is the Invalid Option. Try again !!'.PHP_EOL);
		}
		
	}
	

}

public function getArguments(){
	return $_SERVER['argv'];
}

public function argument($n=''){
	$argv = $_SERVER['argv'];
	$count= count($argv);
	if($n=='' or $n==0){
		return end($argv);
	}
	if(!($n<=$count)){
		$this->throw_error('Argument does not exist');
	}else{
		return $argv[$n-1];
	}
	
}

public function run($executable){
	return system($executable);
}

public function cli_execute($executable){
	return exec($executable);
}


public function flag($keyname){
	return end(explode($keyname,$this->argument()));
}


// To be used in Cli mode only
public function output(...$arguments){
	foreach ($arguments as $index => $value) {
		echo $value;
	}
}

public function throw_error($argument){
	echo "[91m ==> [EXCEPTION RAISED] {$argument} [0m".PHP_EOL;
}

public function help($instance){
	foreach($instance as $title => $info_value){
		if(is_array($info_value)){
			foreach ($info_value as $in => $value) {
				if(is_int($in)){
					$x  = ($in+1);
				}
				echo " [ $title ]\t\t".$x.':'.$value.PHP_EOL;
			}
		}else if(!is_array($info_value) and !is_object($info_value)){
			if(is_null($info_value))$info_value = 'NULL';
			echo $title." :",$info_value,PHP_EOL;
		}else{

			if(is_object($info_value)){
				foreach ($info_value as $lk => $lkvalue) {
					echo "\t\t".$title.':'.$lkvalue.PHP_EOL;
				}
			}
			
		}
		
	}
}

}




