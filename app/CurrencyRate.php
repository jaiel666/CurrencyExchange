<?php

namespace App;

class CurrencyRate
{
    private array $rates;

    public function __construct(array $rates = [])
    {
        $this->rates = $rates;
    }

    public function setRates(array $rates)
    {
        $this->rates = $rates;
    }

    public function getRates(): array
    {
        return $this->rates;
    }
    public function fetchRatesFromAPI(CurrencyAPI $api)
    {
        $data = $api->fetchDataFromAPI();
        $this->setRates($data['conversion_rates']);
    }

}
