<?php

$merchant = new Merchant();

$transactions = $merchant->getTransactions();

foreach ($transactions as $merc_id => $transaction) {
    echo "Merchant with id : " . $merc_id . " has spent £" . $transaction . PHP_EOL;
}

function __autoload($class_name) {
    require_once('../models/'.$class_name.'.php');
}