<?php

/**
 * test invoer: $_GET['csv_barcodes'] = '8715019170836,4026495490252';
 */
$stock = new Stock;
$stock->run($_GET['csv_barcodes']);


class Stock
{
    var $username = 'cyclesoftware';
    var $password = 'test';
    var $request_barcodes = array();
    var $development_mode = false;

    /**
     * if development mode is true, set display errors to true
     */
    function __construct()
    {
        if ($this->development_mode === true) {
            // display errors for development
            ini_set('display_errors', 1);
        }
    }

    /**
     * @param string $csv_barcodes b.v. "8715019170836,4026495490252"
     * @return void
     */
    public function run($csv_barcodes)
    {
        // the barcodes are given by GET parameter
        $csv = $_GET['csv_barcodes'];
        $arr = explode(';', $csv);
        $art = array();
        foreach ($arr as $value) {
            if (!empty($value)) {
                $art[] = array("VariantArticleID" => trim($value));
            }
        }
        $this->request_barcodes = $art;
        $this->request_json($arr);
    }

    /**
     * @param array $art
     * @return void
     */
    private function request_json($art)
    {
        // array with barcodes for the stock request
        $art = array('8715019170836', '4026495490252');
        $art = array_map('urlencode', $art);
        $get_param = http_build_query(array('SupplierCheck' => 1, // 1/0
                                            'Visitor_IP'    => $_SERVER['REMOTE_ADDR'],
                                            'User_Agent'    => $_SERVER['HTTP_USER_AGENT']));

        if (function_exists('curl_init')) {
            $url = 'https://s02.cyclesoftware.nl/app/api/stockinfo/' . implode('/', $art) . '?' . $get_param;
            echo $url . "\n\r<br/><br/><br/>";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);// seconds to connect
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);// 30 seconds to receive
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERPWD, $this->username . ':' . $this->password);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json_string = curl_exec($ch);
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $json_array = json_decode($json_string, true);
            if ($http_status != 200) {
                // error
                echo curl_error($ch);
            }
            else {
                $this->output_results($json_array);
            }
            curl_close($ch);
        }
        else {
            $url = 'https://' . $this->username . ':' . $this->password . '@s02.cyclesoftware.nl/app/api/stockinfo/' . implode('/', $art) . '?' . $get_param;
            // if curl module is not loaded
            $json_string = file_get_contents($url);
            $json_array = json_decode($json_string, true);
            $this->output_results($json_array);
        }
    }


    /**
     * @param array $result
     * @return void
     */
    private function output_results($result)
    {

        $inResult = array();
        if (!empty($result['ArticleItemsStock'])) {
            foreach ($result['ArticleItemsStock'] as $data) {
                //echo '<pre>',print_r($data),'</pre>';
                if (!isset($data['VariantArticleID'])) {
                    foreach ($data as $dat) {
                        $this->js_winkels($dat["VariantArticleID"], $dat['StockStores']);
                        $this->js($dat["VariantArticleID"], $dat['Stock']);
                        $inResult[ $dat["VariantArticleID"] ] = $dat["VariantArticleID"];

                    }
                }
                else {
                    $this->js_winkels($data["VariantArticleID"], $data['StockStores']);
                    $this->js($data["VariantArticleID"], $data['Stock']);
                    $inResult[ $data["VariantArticleID"] ] = $data["VariantArticleID"];
                }

            }
        }
        foreach ($this->request_barcodes as $key => $val) {
            if (!isset($inResult[ $val['VariantArticleID'] ])) {
                // onbekende leverdatum
                $this->js($val['VariantArticleID'], 'Onbekend');
            }

        }
    }

    /**
     * Get status text
     * @param string $text
     * @return string
     */
    private function text($text)
    {
        return str_replace(array('Niet voorradig', 'Onbekend'), 'Niet op voorraad', $text);
    }


    /**
     * Output JS
     * @param string $barcode
     * @param array $data
     * @return void
     */
    private function js_winkels($barcode, $data)
    {

        if (isset($data['item'])) {
            $data = $data['item'];
        }
        $text = "";
        foreach ($data as $row) {
            $text .= "Beschikbaarheid " . $row['StoreName'] . ': ' . $row['Stock'] . "<br/>";
        }
        echo "$('*[stock_barcode_stores=\"" . $barcode . "\"]').each(function(index,id){ ";
        if ($text == 'Direct leverbaar') {
            //echo "$(this).html('<img src=\"/image/opvoorraad.png\"/>".$text."');";
            echo "$(this).html('" . $this->text($text) . "');";
        }
        else {
            echo "$(this).html('" . $this->text($text) . "');";
        }
        echo "});";
    }

    /**
     * @param string $barcode
     * @param string $text
     * @return void
     */
    private function js($barcode, $text)
    {

        echo "$('*[stock_barcode=\"" . $barcode . "\"]').each(function(index,id){ ";
        if ($text == 'Direct leverbaar') {
            //echo "$(this).html('<img src=\"/image/opvoorraad.png\"/>".$text."');";
            echo "$(this).html('" . $this->text($text) . "');";
        }
        else {
            echo "$(this).html('" . $this->text($text) . "');";
        }
        echo "});";
    }

}
