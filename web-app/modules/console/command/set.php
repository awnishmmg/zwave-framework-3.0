<?php 

class Set extends BaseCommand{

	public $title = 'set command.';
	public $version = '1.0';
	public $description = 'set command used to set values for varaibles,Environment Variables,Super Global Variable and Other System defined varaibles.';
	public $commands = ['--baseurl'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function set(){
		$this->info();
	}

	public function __baseurl(){

		$tpl_path = CLI_SYSTEM_PATH.'/modules/console/src/template/'.
		'env'.'.tpl';
		if(!file_exists($tpl_path)){
			$this->command->throw_error(basename($tpl_path,'.tpl').".tpl Template Does not exist ");
		}

		$template_string = file_get_contents($tpl_path);
		// $this->command->output($template_string);

		// Take input from Command Name
		
		$baseurl = $this->command->input("Enter the Baseurl <absolute-path>:");
		$this->command->output($baseurl);

		$replace_syntax['ENV_BASE_URL'] = $baseurl;

		foreach($replace_syntax as $key => $value){
		   $template_string = str_replace("{{".$key."}}",$value,$template_string);
		}

		$web_path = dirname(dirname(dirname(__DIR__)));

		// $this->command->output($template_string);
		
		try{

			$fp = fopen($web_path.'/../.htaccess','w+');
			if($fp){
				
			fwrite($fp, $template_string);
			$this->command->output(" BASE URL Set Successfully".PHP_EOL);

			}else{
				throw new Exception;

			}
		}catch(Exception $e){
			$this->command->throw_error($e->getMessage());
		}finally{
			fclose($fp);
		}
		
		
	}
}