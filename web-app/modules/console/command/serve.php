<?php

Class Serve{

	public $title = 'zwave :: serve command';
	public $version = '1.0';
	public $description = 'serve command can run inbuilt cli server';
	public $commands = ['--list','--port','--target','--router'];
	public $input = NULL;
	public $execute = ['run-server','version','run-server::login','launch::dbadmin'];

	public function __construct(){

		$web_path = dirname(dirname(dirname(__DIR__)));
		$env_htaccess = file($web_path."/../.htaccess");
		$last_line = end($env_htaccess);
		$arr = explode("SetEnv ENV_BASE_URL ",$last_line);
		$base_url = end($arr);
		$this->base_url = $base_url;
	    $this->execute['run-server'] = 'start '.USER_AGENT.' '.$base_url;
		
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

		return $output = $this->command
								->run(
									$this->execute(
										$this->command
											  ->argument()
										)
								);
	}

	private function version(){
		return "PHP CLI Version ".PHP_VERSION;
	}

	private function __list(){
		
	}

	private function run_server_login(){

		$AUTH__ADMIN__CREDENTIALS = AUTH__ADMIN__CREDENTIALS;
		
		$username = $AUTH__ADMIN__CREDENTIALS['username'];
		$password = $AUTH__ADMIN__CREDENTIALS['password'];

		$security_token = base64_encode("q12w3e4r5t6yt5r4e3w2q12w3r45ty67u8iu7y6tr4e3w2q12w3r5t6y7i9i8u7t5re32wq12we4rt6y7u8i9i8u7t5re32q12e4ry6u89oi8y6r4e2q12we4r6yu8io0po9u7t5e321q2we4r6u89o0p-p0ou7tre21q2we4r6yu8i9o0-p0ou7t5e321qq2w3t5y7ui90-p0i8y6r4w2q12we4r6y7u80po9u7t5421q2w3r5t6y89o0po9u7t54e32q12we4r6yui9o0-p0o9u7yr4e3w2q12w34rt6yu8o0o9i8u7tr4w2q12we4rt6yu8o0p0o9i8u7te3w2q1");

		$url = $this->base_url."login?security_token={$security_token}&cli_action=attempt-login&username={$username}&password={$password}";

		return  $this->command->run('start '.USER_AGENT.' "'.$url.'"');
	}

	public function launch_dbadmin(){

		$url = $this->base_url.'phpmyadmin/?run-mode=cli&sapi=command';
		return  $this->command->run('start '.USER_AGENT.' "'.$url.'"');
	}

	


}