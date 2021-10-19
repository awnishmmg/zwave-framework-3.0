<?php

class Show extends BaseCommand{

	public $title = 'zwave show Command';
	public $version = '1.0';
	public $description = 'show command used to show routes, migrations, inbuilt session variable, setting data, web Routes.';
	public $commands = ['--routes','--webroutes'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
		
	}

	public function show(){
		$this->info();
	}

	public function __routes(){

		include_once CLI_SYSTEM_PATH.'/config/routes.php';
		$this->command->output(PHP_EOL);
		$this->command->output('List of All the Routes :-',PHP_EOL);

		$table = new \LucidFrame\Console\ConsoleTable();

		$table->addHeader('Route/Controller');
    	$table->addHeader('Allow Methods');
    	

		foreach($routes as $route => $value){
			$table->addRow();
			$table->addColumn($route.' ('.count(($value)).' methods) ');
			if(is_array($value)){
				foreach ($value as $index => $method) {
					$table->addColumn(($index+1).':'.$method);
				}
			}else{
				$table->addColumn($value);
			}
			$table->addRow()
					->addColumn(PHP_EOL.PHP_EOL);
			
		}

		// $table->showAllBorders();
		$table->hideBorder();
		$table->display();

	}

	public function __webroutes(){

		include_once CLI_SYSTEM_PATH.'/config/root/web-routes.php';

		$this->command->output(PHP_EOL);
		$this->command->output('List of All the WebRoutes :-',PHP_EOL);

		$table = new \LucidFrame\Console\ConsoleTable();

		$table->addHeader('RouteUrl');
    	$table->addHeader('Controller Name');
    	$table->addHeader('Mapping Api');
    	$table->addHeader('Middleware Resource mapped in (.htaccess)');
    	
		foreach($WebRoutes as $route => $value){
			$table->addRow();
			$table->addColumn($route);
			if(is_array($value)){
				foreach ($value as $Controller => $method) {
					$table->addColumn($Controller);
					$table->addColumn($method);
					if(preg_match("/\.\*/", $method)){
						$table->addColumn('Middleware = [Controller/Method]');
					}elseif(preg_match("/self/", $method)){
						$table->addColumn('Middleware = [Controller]');
					}elseif(preg_match("/method/", $method)){
						$table->addColumn('Middleware = [method]');
					}
					
				}
			}else{
				$table->addColumn($value);
			}
			
			
		}

		// $table->showAllBorders();
		// $table->hideBorder();
		$table->display();

	}

}