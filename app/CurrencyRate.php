<?php
namespace App;
class CurrencyRate
{
    private array $rates;

    public function __construct(CurrencyAPI $api)
    {
        $data = $api->fetchDataFromAPI();
        $this->rates = $data['conversion_rates'];
    }

    public function getRates(): array
    {
        return $this->rates;
    }
}
