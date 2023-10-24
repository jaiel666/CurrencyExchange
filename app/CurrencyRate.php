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
}
