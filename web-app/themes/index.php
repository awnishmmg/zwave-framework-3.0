<?php
startSection();

$donot_scan=['default.html','.htaccess','index.php','.','..'];

echo "<ul>";
foreach (scandir('.') as $key => $value) {
	if(!in_array($value, $donot_scan)){
		
	echo '<li><a href="'.base_url('themes/'.$value.'/index.html').'" target="themesFrame">'.$value.'</a>';
	echo '&nbsp; || &nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url('themes/'.$value.'/index.html').'">Full View</a></li>'."\n";
	}
}
echo "</ul>";
echo "<iframe src='".base_url('themes/default.html')."' name='themesFrame' height='100%' width='100%'></iframe>";
endSection();

?>