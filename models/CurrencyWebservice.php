<?php

/**
 * Dummy web service returning set exchange rates
 *
 */
class CurrencyWebservice {
    /**
     * Return set value here for basic currencies like GBP USD EUR (simulates real API)
     * Also having a $main_currency variable for the ability to change the main currency for transactions
     *
     */

    private $main_currency;

    public function __construct($main_cur) {
        $main_cur ? $this->main_currency = $main_cur : 'GBP';
    }

    /**
     * @param $currency Input expected to currently be 'GBP', 'EUR' or 'USD'
     * @return bool|float Either the exchange rate or false
     */
    public function getExchangeRate($currency) {
        switch($this->main_currency){
            case 'GBP' :
                switch ($currency){
                    case 'USD' :
                        return (float) 0.7285;
                    case 'EUR' :
                        return (float) 0.8195;
                    case 'GBP' :
                        return (float) 1.0000;
                    default :
                        return false;
                }
            case 'USD' :
                switch ($currency){
                    case 'USD' :
                        return (float) 1.0000;
                    case 'EUR' :
                        return (float) 1.1249;
                    case 'GBP' :
                        return (float) 1.3726;
                    default :
                        return false;
                }
            case 'EUR' :
                switch ($currency){
                    case 'USD' :
                        return (float) 0.8889;
                    case 'EUR' :
                        return (float) 1.0000;
                    case 'GBP' :
                        return (float) 1.2201;
                    default :
                        return false;
                }
            default :
                return false;
        }
        return false;
    }
}