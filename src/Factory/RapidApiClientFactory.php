<?php

namespace App\Factory;

use GuzzleHttp\Client;

class RapidApiClientFactory
{
    public function createNew(string $rapidApiKey): Client
    {
        return new Client(
            [
                'headers' =>
                [
                    'x-rapidapi-key' => $rapidApiKey
                ]
            ]
        );
    }
}
