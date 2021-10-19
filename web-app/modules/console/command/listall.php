<?php 

class Listall extends BaseCommand{

	public $title = 'zwave listall command.';
	public $version = '1.0';
	public $description = 'listall command is used to show all the available commands in zwave.';
	public $commands = ['--command'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function listall(){
		$this->info();
	}

	public function __command($donot___scan= ['reserved']){
		
		$i=1;
		foreach ($this->command->getAllCommands() as $index => $value){
			if(!in_array($value,$donot___scan)){
				$this->command->output(($i),':',basename($value,'.php'),PHP_EOL);
				$i++;
			}

		}
	}

}