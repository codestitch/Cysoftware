<?php
 // header('Content-Type: application/json');
 header('Cache-Control: no-cache');
 set_time_limit(0);
 ini_set('memory_limit', '-1');
 // ini_set('mysql.connect_timeout','0');
 ini_set('max_execution_time', '0');
 ini_set('date.timezone', 'Asia/Manila');

$username = 'cyclesoftware';
$password = 'test'; 
 
$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
));

$file = @file_get_contents('https://' . $username . ':' . $password . '@s02.cyclesoftware.nl/app//api/articledata/');
echo $file;
// echo json_encode($file, JSON_UNESCAPED_SLASHES);

 // $obj = json_decode($xml);
 // var_dump($obj);
 // $xml = simplexml_load_string($file); 
 // $xml = json_encode(array($xml));
 // $output = json_decode($xml, true); 
 // echo json_encode($output); 


// $file2 = @file_get_contents('https://' . $this->username . ':' . $this->password . '@s02.cyclesoftware.nl/app/api/stockinfo/' . implode('/', $art) . '?' . $get_param;);
 // $file2 = @file_get_contents('https://s02.cyclesoftware.nl/app/cs/api/ecommerce/soap/?wsdl');
 // $xml = simplexml_load_string($file2); 
 // $xml = json_encode(array($xml));
 // $output = json_decode($xml, true); 
 // echo json_encode($output); 
 // // var_dump($output);
?>