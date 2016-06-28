<?php
/**
 * CycleSoftware example script
 * Method: GetOrderStatus
 */

try {

    $uri = 'https://api.cyclesoftware.nl/app/cs/api/ecommerce/soap_2_0/?wsdl';
    $client = new \SoapClient($uri, array('trace'          => false,
                                          'use'            => SOAP_LITERAL,
                                          'encoding'       => 'UTF-8',
    ));
    $input = new \stdClass();
    $input->Authentication->username = '';
    $input->Authentication->password = '';
    $input->Authentication->dealer_id = '0';
    $input->order_id = '3623';
    $input->order_reference_id = ''; // webshop order id
    $result = $client->GetOrderStatus($input);
    // format to $result->OrderResultItems->OrderResultItem to array if only one result is returned
    if(!is_array($result->OrderResultItems->OrderResultItem)) $result->OrderResultItems->OrderResultItem = [$result->OrderResultItems->OrderResultItem];
    var_dump($result);
}
catch (\SoapFault $e) {
    echo $e->getMessage();
}
