<?php

Class BaseCommand{

	public $title = '';
	public $version = '--dev';
	public $description = '';
	public $commands = [];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		
		
	}

	public function execute($command){	
			return $this->execute[$command];
	}

	public function info(){
		$this->command->help($this);
	}

    public function handle(){

		$this->command = new Command();
		$argument = $this->command->argument();
		if(in_array($argument, $this->commands) or in_array($argument, $this->execute)){
			$argument = str_replace(array('-','::'), '_', $argument);
			
		}

		if($argument == strtolower(__CLASS__)){
			return $this->info();
		}

		elseif(!method_exists($this, $argument)){
			$this->command->throw_error($argument.' Command Does not Exist');
		}
		
		else{

			$this->command->output($this->$argument());
		}

	}

}