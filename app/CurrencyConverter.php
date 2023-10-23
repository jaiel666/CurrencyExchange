<?php

namespace App;

namespace App;

class CurrencyConverter
{
    public function convert($amount, $fromCurrency, $toCurrency, CurrencyRate $rates)
    {
        $conversionRates = $rates->getRates();
        $convertedAmount = $amount * ($conversionRates[$toCurrency] / $conversionRates[$fromCurrency]);
        return number_format($convertedAmount, 2);
    }

    public function run()
    {
        $api = new CurrencyAPI();
        $rates = new CurrencyRate();

        echo "Enter the amount and source currency (e.g., '100 USD'): ";
        $userInput = readline();
        list($amount, $fromCurrency) = explode(' ', $userInput);

        echo "Enter the target currency: ";
        $toCurrency = readline();

        $data = $api->fetchDataFromAPI();
        $rates->setRates($data['conversion_rates']);

        $result = $this->convert((float) $amount, $fromCurrency, $toCurrency, $rates);

        echo "Conversion result: $result $toCurrency\n";
    }
}



