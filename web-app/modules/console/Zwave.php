<?php

Class Zwave{

	public $title = 'Zwave Frame-work Terminal from Awisoft.net Published By(Awnish Kr.)';
	public $version = '1.0';
	public $description = 'Zwave CLI Terminal Description';
	public $commands = ['zwave','listall'];
	public $input = NULL;

	public function __construct($Input){
		$this->input = $Input;
		if(count($this->input)<2){
			foreach($this as $command => $info){
					$display = "Available Commands : ";
				if($command ==  'input'){
					$display = "Input Commands";
				}
			if(is_array($info)){
				echo $display.PHP_EOL;
				foreach($info as $index => $inline_command){
					if(is_numeric($index)){
						echo "\t\t".($index+1). " : ".$inline_command.PHP_EOL;
					}else{
						echo "\t\t".$index.":".$inline_command.PHP_EOL;
					}
					
				}
			}else{
				echo ucfirst($command).": ".$info.PHP_EOL;
			}
		}

		}


	}


	public function run(){
		$this->execute(); 
	}

	private function execute(){
		global $commands;
		$raise_error = "";
		$cli_commands = $this->input;
		$current_command = $cli_commands[1]??NULL;
		//Check Command for Internal
		if(!is_null($current_command)){
			$commands_dir = scandir(__DIR__.'/command/');
			unset($commands_dir[0],$commands_dir[1]);
			//Check Command for Application level
			require_once SYSTEM_PATH.'/config/command.php';
			if(!in_array($current_command.'.php', $commands_dir) and !in_array($current_command, array_keys($commands))){
			echo "==> [{$current_command}] Command Does Not Exist.".PHP_EOL;
			exit;
			}
		}

		//Code For Executing the Code
		if(file_exists(__DIR__.'/command/'.$current_command.'.php')){
			require_once __DIR__.'/command/'.$current_command.'.php';
			$this->execute_command($current_command);	
		}else if(file_exists(SYSTEM_PATH.'/config/command/'.$current_command.'.php')){
			require_once SYSTEM_PATH.'/config/command/'.$current_command.'.php';
			$this->execute_command($current_command);		
		}else{
			echo "==> [{$current_command}] Command Exist But Definition Not Found.".PHP_EOL;
			exit;
		}



	}

	public function execute_command($current_command){
		$current_command = str_replace(array('-','::'),'_', $current_command);
		$object = new $current_command();
		$object->handle();
	}

}