<?php
/**
 * CycleSoftware example script
 * Method: AddOrderItems
 */

try {

    $uri = 'https://api.cyclesoftware.nl/app/cs/api/ecommerce/soap_2_0/??wsdl';
    $client = new \SoapClient($uri, array('trace'          => false,
                                          'use'            => SOAP_LITERAL,
                                          'encoding'       => 'UTF-8',
    ));
    $input = new \stdClass();
    $input->Authentication->username = '';
    $input->Authentication->password = '';
    $input->Authentication->dealer_id = '0';
    $input->order_id = ''; // cs order id
    $input->order_reference_id = '';
    $input->OrderItems = new stdClass();
    $input->OrderItems->OrderItem = [];
    $OrderItem = new \StdClass();
    $OrderItem->order_item_is_bicycle = '0';
    $OrderItem->order_item_barcode = '827272727';
    $OrderItem->order_item_quantity = '2';
    $OrderItem->order_item_description = 'DescriptionTest';
    $OrderItem->order_item_unit_price_in_vat = '12.99';
    $OrderItem->order_item_unit_discount_amount_in_vat = '2.99';
    $OrderItem->order_item_vat_code = '2';
    $input->OrderItems->OrderItem[] = $OrderItem;
    $result = $client->AddOrderItems($input);
    // format to $result->OrderResultItems->OrderResultItem to array if only one result is returned
    if(!is_array($result->OrderResultItems->OrderResultItem)) $result->OrderResultItems->OrderResultItem = [$result->OrderResultItems->OrderResultItem];
}
catch (\SoapFault $e) {
    echo $e->getMessage();
}
