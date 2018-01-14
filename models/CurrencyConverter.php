<?php

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter {
    private $main_currency;

    // Set up the main used currency
    public function __construct() {
        $this->main_currency = 'GBP';
    }

    /**
     * @param $amount Expected amount given by the data feed
     * @return bool|float Output is either the converted amount or false
     */
    public function convert($amount) {
        $api = new CurrencyWebservice($this->main_currency);

        // Splitting the text on the first occurrence of a number
        $amount = preg_split('/(?=\d)/', $amount, 2);

        $current_currency = $this->symbolConverter($amount[0]);
        $rate = $api->getExchangeRate($current_currency);

        if($rate) {
            return $amount[1] * $rate;
        } else {
            return false;
        }
    }

    /**
     * Converts the currency symbol to the currency code
     * @param $symbol
     * @return string
     */
    private function symbolConverter($symbol) {
        switch ($symbol) {
            case '£' :
                return 'GBP';
            case '€' :
                return 'EUR';
            case '$' :
                return 'USD';
            default :
                return false;
        }
    }
}