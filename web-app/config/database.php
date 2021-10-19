<?php

$hostname = $database['host'].":".$database['port'];
$username = $database['username'];
$password = $database['password'];
$dbname = $database['dbname'];

try
{	
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    if($con=mysqli_connect($hostname,$username,$password,$dbname)){
    	return $con;
    }
    else
        throw new Exception;
}
catch(Exception $e)
{
    echo $e->getMessage();
}


 ?>