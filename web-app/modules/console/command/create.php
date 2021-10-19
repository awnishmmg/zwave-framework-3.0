<?php 

class Create extends BaseCommand{

	public $title = 'Zwave Create Command';
	public $version = '1.0';
	public $description = 'Create Command enable us to create any specified database entity.';
	public $commands = ['user'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function create(){
		$this->info();
	}

	public function user(){
		global $chain;

		$username = $this->command->input("Enter the username:");
		// $this->command->output($username.PHP_EOL);
		$password = $this->command->secret("Enter the password:");
		// $this->command->output($password.PHP_EOL);
		$role = $this->command->select("Enter the role:",
			['admin','user']);

		$role_id = ['admin'=>1,'user'=>2];

		$this->command->output($role.PHP_EOL);
		$encrypted_pass = pass_encrypt($password);
		// $this->command->output($encrypted_pass.PHP_EOL);
		if($this->command->confirm("Do you really want to create user?"))
		{
			
			if(insertat('tbl_login', ['auth_id'=>$username,'auth_pass'=>$encrypted_pass,'role_id'=>$role_id[$role]])){
				$this->command->output("{$username} user created successfully.".PHP_EOL);
			}else{
				$this->command->output("{$username} user not created.".PHP_EOL);
			}



		}else{
			$this->command->output("User not be Created.".PHP_EOL);
		}

	}

}