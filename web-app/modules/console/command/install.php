<?php 

class Install extends BaseCommand{

	public $title = 'zwave installer :: Package Installer';
	public $version = '1.0 Open Source License (MIT)';
	public $description = 'zwave install command used to install any external package from packagist.org using composer dependency manager, this tool requires composer to be installed.';
	public $commands = ['--package','--clean'];
	public $input = NULL;
	public $execute = [];

	private $default_Package = [

		'~/bulk-upload'=>'',

		'~/console-table'=>'',
		
		'~/csv-handling'=>'',
		
		'~/image-captcha'=>'',
		
		'~/phpmailer'=>'',
		
		'~/table-creater'=>'',
		
		'~/terminal'=>'',
		
		'~/txt-handling'=>'',
		
		'~/xls-to-csv'=>''

	];


	public function __construct(){
		parent::__construct();
		
	}

	public function install(){
		$this->info();
	}

	public function __package(){

		$package_name =$this->command->input('Enter the Package Name:');
		$package_alias =$this->command->input('Enter the Package Alias:');

		$this->command->run("cd package && mkdir {$package_alias} && cd {$package_alias} && composer require ".$package_name.' && cd.. && cd..');

		$path = CLI_SYSTEM_PATH.'/package';

		$scand_dir=scandir($path);
		unset($scand_dir[0],$scand_dir[1]);

		foreach($scand_dir as $index => $package){
			if(is_dir($path.'/'.$package)){
				if(!in_array("~/".$package,array_keys($this->default_Package))){
					$package_json[md5(rand(111111,999999))] = "{$package}/vendor/autoload.php";
					}
		}
			
		}

		$fp = fopen($path.'/package.json','w+');

		$json_str = "{ \n\n ".'"package-file-name":"package.json",'."\n\n".'"downloaded-via-composer":"zwave-package-manager",'."\n\n";
	
		foreach($package_json as $key => $value){
			$json_str .= "\"{$key}\":\"{$value}\",\n";
		}	

		fwrite($fp,$json_str."\n\n }");
		fclose($fp);


		//create a package file
		$fp1 = fopen($path."/{$package_alias}.php",'w+');
		$php_tag = "<?php \n\n\n";
		$php_code = "require_once '{$package_alias}/vendor/autoload.php' \n";

		fwrite($fp1,$php_tag.$php_code);
		fclose($fp1);

		$this->command->output("[92m {$package_name} Downloaded On {$package_alias} Successfully. [0m".PHP_EOL);



	}


	public function __clean(){

			$clean_package=[];
			$path = CLI_SYSTEM_PATH.'/package';
			$scand_dir=scandir($path);
			unset($scand_dir[0],$scand_dir[1]);

			foreach($scand_dir as $index => $package){
				
				if(is_dir($path.'/'.$package)){
					
					if(!in_array('~/'.$package,array_keys($this->default_Package))){
						$tmp_dir = scandir($path.'/'.$package);
						unset($tmp_dir[0],$tmp_dir[1]);
						if(count($tmp_dir)<=1){
							$clean_package[] = $path.'/'.$package;
						}
					}
					
				}
			}

			foreach($clean_package as $index => $toBe_deleted){

				array_map('unlink', glob("$toBe_deleted/*.*"));
				rmdir($toBe_deleted);

				if(file_exists($path.'/'.basename($toBe_deleted).'.php')){
					unlink($path.'/'.basename($toBe_deleted).'.php');
				}
			}

			$path = CLI_SYSTEM_PATH.'/package';
			$scand_dir=scandir($path);
			unset($scand_dir[0],$scand_dir[1]);

			foreach($scand_dir as $index => $package){
				if(is_dir($path.'/'.$package)){
					if(!in_array("~/".$package,array_keys($this->default_Package))){
					$package_json[md5(rand(111111,999999))] = "{$package}/vendor/autoload.php";
					}
				}
			
			}

			$fp = fopen($path.'/package.json','w+');

			$json_str = "{ \n\n ".'"package-file-name":"package.json",'."\n\n".'"downloaded-via-composer":"zwave-package-manager",'."\n\n";
			
			foreach($package_json as $key => $value){
				$json_str .= "\"{$key}\":\"{$value}\",\n";
			}	

			fwrite($fp,$json_str."\n\n }");
			fclose($fp);
			
			$this->command->output("[92m Package Directory Safely got Cleared !!![0m ".PHP_EOL);
	}
			
		
	

}