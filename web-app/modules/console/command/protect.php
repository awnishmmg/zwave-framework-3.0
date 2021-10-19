<?php 

class Protect extends BaseCommand{

	public $title = 'protect command tool';
	public $version = '1.0';
	public $description = 'protect command tool is used to protect the source code';
	public $commands = ['--source'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function protect(){
		$this->info();
	}

	public function __source(){
		$this->command->output('Check It');
	}

}