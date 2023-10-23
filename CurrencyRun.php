<?php

require_once 'vendor/autoload.php';
use App\CurrencyConverter;

$application = new CurrencyConverter();
$application->run();
