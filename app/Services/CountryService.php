<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    public function fetchCountries()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response->successful()) {
            return collect($response->json())->map(function ($country) {
                return [
                    'name' => $country['name']['common'] ?? 'Unknown',
                    'code' => $country['callingCodes'][0] ?? 'Unknown',
                ];
            });
        }

        return collect();
    }
}
