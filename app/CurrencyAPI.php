<?php

namespace App;
class CurrencyAPI
{
    private string $apiUrl = 'https://v6.exchangerate-api.com/v6/9e7e2f3da23902d8ffe02f67/latest/USD';

    public function fetchDataFromAPI(): array
    {
        $response = file_get_contents($this->apiUrl);
        return json_decode($response, true);
    }
}

