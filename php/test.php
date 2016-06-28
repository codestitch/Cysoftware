<?php
 // header('Content-Type: application/json');
 header('Cache-Control: no-cache');
 set_time_limit(0);
 ini_set('memory_limit', '-1');
 // ini_set('mysql.connect_timeout','0');
 ini_set('max_execution_time', '0');
 ini_set('date.timezone', 'Asia/Manila');

// $username = 'cyclesoftware';
// $password = 'test'; 

$username = 'cuwa76';
$password = 'fugi88'; 
$function = $_GET['function'];


$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
));

switch ($function) {
	case 'getproducts':
		
		$file = @file_get_contents('https://' . $username . ':' . $password . '@s02.cyclesoftware.nl/app/api/v2/articledata/');
		echo $file; 
		break;


	case 'getproductdetail':
		$bicycleID = $_GET['bicycleID'];
		
		//https://s02.cyclesoftware.nl/app/api/v2/articleinfo/2388
		$file = @file_get_contents('https://' . $username . ':' . $password . '@s02.cyclesoftware.nl/app/api/v2/articleinfo/' . $bicycleID);
		// echo 'https://' . $username . ':' . $password . '@s02.cyclesoftware.nl/app/api/v2/articleinfo/:' . $bicycleID;
		echo $file; 
		break;  
}
 
 

?>