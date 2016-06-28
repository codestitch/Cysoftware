<?php
/**
 * CycleSoftware example script
 * Method: UpdateOrder
 */

try {

    $uri = 'https://api.cyclesoftware.nl/app/cs/api/ecommerce/soap_2_0/?wsdl';
    $client = new \SoapClient($uri, array('trace'          => false,
                                          'use'            => SOAP_LITERAL,
                                          'encoding'       => 'UTF-8',
    ));
    $input = new \stdClass();
    $input->Authentication->username = '';//username
    $input->Authentication->password = '';//password
    $input->Authentication->dealer_id = '0';
    $input->order_id = '3623'; // order id in CS
    $input->order_reference_id = ''; // webshop order id used in SaveOrder
    $input->UpdateValue = new \stdClass();
    $input->UpdateValues->UpdateValue = [];
    $input->UpdateValues->UpdateValue[0] = new \stdClass();
    $input->UpdateValues->UpdateValue[0]->name = 'order_date_preferred_delivery';
    $input->UpdateValues->UpdateValue[0]->value = date('Y-m-d H:i:s', time() + 1);

    $input->UpdateValues->UpdateValue[1] = new \stdClass();
    $input->UpdateValues->UpdateValue[1]->name = 'order_reference_text';
    $input->UpdateValues->UpdateValue[1]->value = uniqid();

    $input->UpdateValues->UpdateValue[2] = new \stdClass();
    $input->UpdateValues->UpdateValue[2]->name = 'order_track_trace_reference';
    $input->UpdateValues->UpdateValue[2]->value = uniqid();

    $result = $client->UpdateOrder($input);
    // format to $result->OrderResultItems->OrderResultItem to array if only one result is returned
    if(!is_array($result->OrderResultItems->OrderResultItem)) $result->OrderResultItems->OrderResultItem = [$result->OrderResultItems->OrderResultItem];
    var_dump($result);
}
catch (\SoapFault $e) {
    echo $e->getMessage();
}
