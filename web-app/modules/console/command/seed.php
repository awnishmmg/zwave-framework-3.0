<?php 

class Seed extends BaseCommand{

	public $title = 'db seed command line seeding tool.';
	public $version = '1.0';
	public $description = 'db seed command can be used to seed database schema with data sets, or fake data using fake module from the package.';
	public $commands = ['seed','db'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function seed(){
		$this->info();
	}

	public function db(){

		$method = '';
		$seeder_class = $this->command->input("Enter Seeder Name:");
		$classpath = explode('::',$seeder_class);
		$seeder_class = $classpath[0];
		$method = @$classpath[1];

		if(!file_exists(CLI_SYSTEM_PATH.'/database/seeds/'.$seeder_class.'.seed.php')){
			$this->command->throw_error("Such File Does not exist".PHP_EOL);
			exit;
		}

		include CLI_SYSTEM_PATH.'/database/seeds/'.$seeder_class.'.seed.php';
		$classname = basename($seeder_class,'.seed.php');
		
		if($method==''){
			$this->command->output($newObject = new $classname());
		}else{

			$newObject = new $classname();
			if(method_exists($newObject, $method))
				$this->command->output($newObject->$method());
			else
				$this->command->throw_error("Such Method Does not exist in {$seeder_class}.seed.php".PHP_EOL);
			exit;
		}



		
	}

}