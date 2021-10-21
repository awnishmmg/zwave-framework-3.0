<?php 

class Delete extends BaseCommand{

	public $title = 'delete command line from zwave';
	public $version = '3.0';
	public $description = 'delete command use to delete the any command or resource.';
	public $commands = ['command'];
	public $input = NULL;
	public $execute = [];
	public $predefined_command = ['create','listall','install','make','db','protect','seed','serve','set','show','delete'];
	private $reserved = ['reserved'];
	private $final_array = [];


	public function __construct(){
		parent::__construct();
		
	}

	public function delete(){
		$this->info();
	}

	public function command(){
		

		$command_list = $this->command->getAllCommands();
		// print_r($command_list);

		// merging the Array
		$this->final_array = array_merge($this->predefined_command,$this->reserved);

		// print_r($this->final_array);

		$user_defined_arr = [];

		foreach($command_list as $all_command){
			$element = basename($all_command,'.php');
			if(!in_array($element,$this->final_array)){
				$user_defined_arr[] = $element;
			}
			
		}


		if(count($user_defined_arr)<=0){
			$this->command->output('No User defined Command Found !!');
		}else{
			
			$option = $this->command->select('select the user define command to delete:',$user_defined_arr);
		#echo $option;
		$file = CLI_SYSTEM_PATH.'/modules/console/command/'.$option.'.php';

		if(file_exists($file)){
			unlink($file);
			$this->command->output(basename($file,'.php').' Command Deleted successfully.');
		}else{
			$this->command->throw_error(basename($file,'.php').' Does not exist');
		}
			

		}//end of logic



	}


}