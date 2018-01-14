<?php

class Merchant {
    /**
     * Holds the logic for the needed calculations for every merchant
     * @return array
     */
    public function getTransactions() {
        $tt = new TransactionTable();
        $cc = new CurrencyConverter();

        $data = $tt->getData();
        $merchant = [];
        for ($i = 1; $i < count($data); $i++) {
            $val = $data[$i];

            if(!isset($merchant[$val[0]])) {
                $merchant[$val[0]] = 0;
            }
            $merchant[$val[0]] += $cc->convert($val[2]);
        }
        return $merchant;
    }
}