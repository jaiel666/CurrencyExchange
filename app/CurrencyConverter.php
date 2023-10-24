<?php

namespace App;

use App\IsoCodes;

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
        $isoCodes = new IsoCodes();


        echo "Enter the amount and source currency (Example: 100 USD): ";
        $userAmount = readline();
        list($amount, $fromCurrency) = explode(' ', $userAmount);

        echo "Enter the currency to convert to: ";
        $toCurrency = readline();

        $toCurrencyName = $isoCodes->get()[$toCurrency];

        $rates->fetchRatesFromAPI($api);

        $result = $this->convert($amount, $fromCurrency, $toCurrency, $rates);

        echo "Conversion result: $result $toCurrencyName\n";
    }
}




