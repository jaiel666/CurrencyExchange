<?php

namespace App;

class CurrencyConverter
{
    public function convert(float $amount, string $fromCurrency, string $toCurrency, CurrencyRate $rates): string
    {
        $conversionRates = $rates->getRates();
        $convertedAmount = $amount * ($conversionRates[$toCurrency] / $conversionRates[$fromCurrency]);
        return number_format($convertedAmount, 2);
    }

    public function run(): void
    {
        $api = new CurrencyAPI();
        $rates = new CurrencyRate();

        echo "Enter the amount and source currency (Example: 100 USD): ";
        $userAmount = readline();
        list($amount, $fromCurrency) = explode(' ', $userAmount);

        echo "Enter the currency to convert to: ";
        $toCurrency = readline();

        $data = $api->fetchDataFromAPI();
        $rates->setRates($data['conversion_rates']);

        $result = $this->convert($amount, $fromCurrency, $toCurrency, $rates);

        echo "Conversion result: $result $toCurrency\n";
    }
}




