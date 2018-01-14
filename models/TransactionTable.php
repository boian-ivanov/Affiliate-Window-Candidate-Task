<?php

/**
 * Class TransactionTable returns split rows of the .csv data file into array variables through the getData() functions
 */
class TransactionTable {
    private $data;

    public function __construct() {
        $this->data = fopen('../data.csv', 'r');
    }

    public function getData() {
        while (!feof($this->data) ) {
            $temp[] = fgetcsv($this->data, 1024);
        }
        fclose($this->data);

        if(isset($temp)) {
            return $temp;
        }
    }
}