<?php

####################| Local Setting or TimeZone Setting ##########################

$timezone = TIME_ZONE;
date_default_timezone_set($timezone);

###################| Local Setting or TimeZone Setting ##########################


# Timezone & date and time setting #


//to get date
function get_date(){
	return date("Y-m-d");	
}

//Readable Day & Time

function get_local_date(){
	return date("Y-M-D");	
}

//to get time 
function get_time(){
	return date("H:i:s");	
}

//# To get current year
function current_year(){
	return date("Y");
}

# To get current month

function current_month(){
	return date("M");
}

# To get current day

function current_day(){
	return date("D");
}

//# To get current year
function get_year(){
	return date("Y");
}
