<?php

namespace App\Service;

use App\Factory\RapidApiClientFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Utils;

class RapidApiClient
{
    const RAPID_COUNTRY_URL = 'https://api-football-v1.p.rapidapi.com/v3/countries';

    private Client $client;

    public function __construct(string $rapidApiKey)
    {
        $this->client =(new RapidApiClientFactory())
            ->createNew($rapidApiKey);
    }

    public function getContent(): float|object|int|bool|array|string|null
    {
        $response = $this->client->request('GET', self::RAPID_COUNTRY_URL);

        return Utils::jsonDecode(
            $response->getBody()->getContents(), true
        );
    }


}
