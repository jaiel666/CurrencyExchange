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
        echo "Enter the amount and source currency (Example: 100 USD): ";
        $userInput = readline();
        list($amount, $fromCurrency) = explode(' ', $userInput);

        echo "Enter the target currency: ";
        $toCurrency = readline();

        $api = new CurrencyAPI();
        $rates = new CurrencyRate($api);

        $result = $this->convert((float) $amount, $fromCurrency, $toCurrency, $rates);

        echo "Conversion result: $result $toCurrency\n";
    }
}


