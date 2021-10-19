<?php

Class Make{

	public $title = 'zwave :: make command';
	public $version = '1.0';
	public $description = 'make command can be used to make any resource, like controller,model,migrate, or any user-defined command';
	public $commands = ['controller','command','route'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		
		
	}

	private function execute($command){	

		return $this->execute[$command];
	}

	private function info(){
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

	private function run_server(){

		$output = $this->command
								->run(
									$this->execute(
										$this->command
											  ->argument()
										)
								);
		return $output;
	}

	private function controller(){

		$controllername = $this->command->input("Enter the Controller Name :");
		// $this->command->output($controllername);

		$controllername = str_replace(['--','-',':','::'],'_',$controllername);

		$Controllercode = "";
		try{
			
			$fp = fopen(CLI_SYSTEM_PATH.'/'.$controllername.'.php','w+');
			if($fp){
				$this->command->output(basename($controllername)." Created Successfully in ".dirname(ucfirst($controllername)));
				// Code Inside Controller

				$Controllercode .= "<?php".PHP_EOL.PHP_EOL.PHP_EOL;
				$Controllercode .= "class ".ucfirst(basename($controllername));
				$Controllercode .= "{".PHP_EOL.PHP_EOL;

				$Controllercode .= "public function index(){".PHP_EOL.PHP_EOL;
				$Controllercode .= "// Write Your logic here".PHP_EOL.PHP_EOL;
				$Controllercode .= "}".PHP_EOL.PHP_EOL;
				$Controllercode .= "}".PHP_EOL;

				fwrite($fp,$Controllercode);

				// Code Inside Controller
			}else{
				throw new Exception;
			}
		}catch(Exception $e){
			$this->command->throw_error($e->getMessage());
		}finally{
			fclose($fp);
		}
		
	}

	private function command(){

		$tpl_path = CLI_SYSTEM_PATH.'/modules/console/src/template/'.__FUNCTION__.'.tpl';
		if(!file_exists($tpl_path)){
			$this->command->throw_error(".tpl Template Does not exist ");
		}

		$template_string = file_get_contents($tpl_path);
		// $this->command->output($template_string);

		// Take input from Command Name
		$commandname = $this->command->input("Enter Command Name :");
		// $this->command->output($commandname);

	   $commandname = str_replace(['--','-',':','::'],'_',$commandname);

		// Take input from title Name
		$title = $this->command->input("Enter $commandname Title :");
		// $this->command->output($title);
		// Take input from version Name
		$version = $this->command->input("Enter $commandname Version :");
		// $this->command->output($version);
		// Take input from description Name
		$description = $this->command->input("Enter $commandname Description :");
		// $this->command->output($description);

		$replace_syntax['classname'] = ucfirst($commandname);
		$replace_syntax['methodname'] = $commandname;
		$replace_syntax['superclassname'] = 'BaseCommand';

		$replace_syntax['title'] = $title;
		$replace_syntax['version'] = $version;
		$replace_syntax['description'] = $description;

		foreach($replace_syntax as $key => $value){
		   $template_string = str_replace("{{".$key."}}",$value,$template_string);
		}

		// $this->command->output($template_string);
		
		try{

			$fp = fopen(CLI_SYSTEM_PATH.'/modules/console/command/'.$commandname.'.php','w+');
			if($fp){
			
			$this->command->output($commandname." Command Created Successfully. ");
			//Write the Code
			$php_tag = "<?php ".PHP_EOL.PHP_EOL;

			fwrite($fp, $php_tag.$template_string);
			//Write the Code	
			}else{
				throw new Exception;

			}
		}catch(Exception $e){
			$this->command->throw_error($e->getMessage());
		}finally{
			fclose($fp);
		}
		
		
	}

	private function route(){

		include CLI_SYSTEM_PATH.'/config/config.php';

		$this->command->output("Enter the Route Information :-".PHP_EOL);
	    
	    $moduleName = $this->command->select("Select the Module we need to Add",array_values($modular));
	    // $this->command->output($moduleName);

	    $routeName = $this->command->output("Enter the \\{$moduleName}\\[Route Name] :".PHP_EOL);

	    $this->command->output($routeName.PHP_EOL);

	}

}