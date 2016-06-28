<?php

/**
 * Webservice, stock info request
 */

$username = 'cyclesoftware';
$password = 'test';
// array with barcodes for the stock request
$art = array('8715019170836', '4026495490252');
$art = array_map('urlencode', $art);
$get_param = http_build_query(array('SupplierCheck' => 1, // 1/0
                                    'Visitor_IP'    => $_SERVER['REMOTE_ADDR'],
                                    'User_Agent'    => $_SERVER['HTTP_USER_AGENT']));

if (function_exists('curl_init')) {
    $url = 'https://s02.cyclesoftware.nl/app/api/stockinfo/' . implode('/', $art) . '?' . $get_param;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);// seconds to connect
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);// 30 seconds to receive
    curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json_string = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $json_array = json_decode($json_string, true);

    if ($http_status != 200) {
        // error
        echo curl_error($ch);
    }
    else {
        // data in array
        echo '<pre>';
        print_r($json_array);
        echo '</pre>';
    }
    curl_close($ch);
}
else {
    $url = 'https://' . $username . ':' . $password . '@s02.cyclesoftware.nl/app/api/stockinfo/' . implode('/', $art) . '?' . $get_param;
    // if curl module is not loaded
    $json_string = file_get_contents($url);
    $json_array = json_decode($json_string, true);
    echo '<pre>';
    print_r($json_array);
    echo '</pre>';
}

