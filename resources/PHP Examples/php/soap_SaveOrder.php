<?php
/**
 * CycleSoftware example script
 * Method: SaveOrder
 */

try {

    $uri = 'https://api.cyclesoftware.nl/app/cs/api/ecommerce/soap_2_0/?wsdl';
    $client = new \SoapClient($uri, array('trace'          => false,
                                          'use'            => SOAP_LITERAL,
                                          'encoding'       => 'UTF-8',
    ));
    $input = new \stdClass();
    $input->Authentication->username = '';// username
    $input->Authentication->password = '';//password
    $input->Authentication->dealer_id = '0'; // standard = 0
    $input->Order = new \StdClass();
    $input->Order->order_reference_text = ''; // webshop reference text
    $input->Order->order_reference_id = intval(microtime(true) * 1000); // webshop order id
    $input->Order->order_is_payed = '1'; // is_payed 1 / 0
    $input->Order->order_payment_method_description = 'ideal'; // payment method description
    $input->Order->order_ship_to_customer = '1'; // 1 => shipping to customer, 0 = pickup in store
    $input->Order->order_shipment_method_description = 'tnt'; // shipping method description
    $input->Order->order_date_preferred_delivery = '2015-12-01'; // date of preferred delivery yyyy-dd-mm

    $input->Order->Customer = new \StdClass();
    $input->Order->Customer->customer_reference = 'REF'; // webshop customer reference
    $input->Order->Customer->customer_name_prefix = 'G';
    $input->Order->Customer->customer_middle_name = 'van';
    $input->Order->Customer->customer_last_name = 'Wijgergangs';
    $input->Order->Customer->customer_postal_code = '5258 hl';
    $input->Order->Customer->customer_housenumber = '2';
    $input->Order->Customer->customer_housenumber_suffix = 'B';
    $input->Order->Customer->customer_street_name = 'Sassenheimseweg';
    $input->Order->Customer->customer_city = 'Berlicum';
    $input->Order->Customer->customer_phone = '0733030050';
    $input->Order->Customer->customer_mobile = '0612345678';
    $input->Order->Customer->customer_country_code_iso_3166 = 'NL';
    $input->Order->Customer->customer_email = 'giel@cyclesoftware.nl';
    $input->Order->Customer->customer_newsletter = '0'; // 1=add to newsletter subscription

    $input->Order->Customer->DeliveryAddress = new \StdClass();
    $input->Order->Customer->DeliveryAddress->delivery_address_use_delivery_address = '1'; // 1 => use alternative delivery address as delivery address
    $input->Order->Customer->DeliveryAddress->delivery_address_name = 'CycleSoftare';
    $input->Order->Customer->DeliveryAddress->delivery_address_street_name = 'Kievitsven 22';
    $input->Order->Customer->DeliveryAddress->delivery_address_postal_code = '5249JJ';
    $input->Order->Customer->DeliveryAddress->delivery_address_housenumber = '4';
    $input->Order->Customer->DeliveryAddress->delivery_address_housenumber_suffix = 'b';
    $input->Order->Customer->DeliveryAddress->delivery_address_city = 'Rosmalen';
    $input->Order->Customer->DeliveryAddress->delivery_address_country_code_iso_3166 = 'NL';
    $input->Order->Customer->DeliveryAddress->delivery_address_remarks = 'Bam';

    $input->Order->OrderItems = new \stdClass();
    $input->Order->OrderItems->OrderItem = []; // array of multiple OrderItems
    $OrderItem = new \StdClass();
    $OrderItem->order_item_is_bicycle = '0'; // 1 => article is bicycle
    $OrderItem->order_item_barcode = '1000';
    $OrderItem->order_item_quantity = '2'; // if bicycle use quantity = 1
    $OrderItem->order_item_description = 'DescriptionTest';
    $OrderItem->order_item_unit_price_in_vat = '12.99';
    $OrderItem->order_item_unit_discount_amount_in_vat = '2.99';
    $OrderItem->order_item_vat_code = '2'; // 0=> no vat, 1=>low vat, 2=>standard vat
    $input->Order->OrderItems->OrderItem[] = $OrderItem;
    $result = $client->SaveOrder($input);

    // format to $result->OrderItems->OrderItem to array if only one result is returned
    if(!is_array($result->OrderItems->OrderItem)) $result->OrderItems->OrderItem = [$result->OrderItems->OrderItem];
    var_dump($result);
}
catch (\SoapFault $e) {
    echo $e->getMessage();
}
