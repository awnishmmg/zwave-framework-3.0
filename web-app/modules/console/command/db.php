<?php 

class Db extends BaseCommand{

	public $title = 'db command ';
	public $version = '1.0';
	public $description = 'db command can be used to create import sql file, or export sql file.';
	public $commands = ['--import','--export'];
	public $input = NULL;
	public $execute = [];

	public function __construct(){
		parent::__construct();
		
	}

	public function db(){
		$this->info();
	}

	public function __import($sqlFile='sample'){
		global $con;
		$sql = $this->command->input("Enter the sql file to import <default:sample> :");

		$sql = (!empty($sql))?$sql:$sqlFile;
		// $this->command->output($sql.PHP_EOL);

		$path = CLI_SYSTEM_PATH.'/database/'.$sql.'.sql';
		$query = '';
		if(file_exists($path)){
		$sqlScript = file($path);	

		foreach ($sqlScript as $line){
			$startWith = substr(trim($line), 0 ,2);
			$endWith = substr(trim($line), -1 ,1);	
			if(empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
				continue;
			}
		
			$query = $query . $line;
			if ($endWith == ';') {
				mysqli_query($con,$query) or die(mysqli_error($con));
			$query= '';		
			}
		  }
			$this->command->output($sql." Imported Successfully.".PHP_EOL);
		}else{

			$this->command->throw_error($sql."Invalid SQL File".PHP_EOL);
			exit;
		}
	}


		public function __export(){
		
		global $con;
		global $dbname;

		$backup_file_name =  $dbname. '_backup_' . time() . '.sql';
		$path = CLI_SYSTEM_PATH.'/database/dumps/'.$backup_file_name;	

		mysqli_set_charset($con,"utf8");

		// Get All Table Names From the Database
		$tables = array();
		$sql = "SHOW TABLES";
		$result = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_row($result)) {
    		$tables[] = $row[0];
		}

		$sqlScript = "";
		foreach ($tables as $table) {
    
    		// Prepare SQLscript for creating table structure
    		$query = "SHOW CREATE TABLE $table";
    		$result = mysqli_query($con, $query);
    		$row = mysqli_fetch_row($result);
    
    		$sqlScript .= "\n\n" . $row[1] . ";\n\n";
    
    
    		$query = "SELECT * FROM $table";
    		$result = mysqli_query($con, $query);
    
    		$columnCount = mysqli_num_fields($result);
    
    		// Prepare SQLscript for dumping data for each table
   		 for ($i = 0; $i < $columnCount; $i ++) {
        	while ($row = mysqli_fetch_row($result)) {
            	$sqlScript .= "INSERT INTO $table VALUES(";
            	for ($j = 0; $j < $columnCount; $j ++) {
                	$row[$j] = $row[$j];
                
                if (isset($row[$j])) {
                    $sqlScript .= '"' . $row[$j] . '"';
                } else {
                    $sqlScript .= '""';
                }
                if ($j < ($columnCount - 1)) {
                    $sqlScript .= ',';
                }
            }
            $sqlScript .= ");\n";
        }
    }
    
    $sqlScript .= "\n"; 
}

	if(!empty($sqlScript))
	{
	    // Save the SQL script to a backup file
	    
	    $fileHandler = fopen($path, 'w+');
	    $number_of_lines = fwrite($fileHandler, $sqlScript);
	    fclose($fileHandler); 

	    // Download the SQL backup file to the browser
	    /*---- Uncomment the Code to Execute the Script from the Browser--*/
	    /**
	     *
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($backup_file_name));
	    ob_clean();
	    flush();
	    readfile($backup_file_name);
	    exec('rm ' . $backup_file_name); 

	    **/
	}

		
}
		

}