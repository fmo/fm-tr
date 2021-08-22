<?php

namespace App\Controller\RapidAPI;

use App\Service\RapidApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;

class CountryController extends AbstractController
{
    public function __invoke(
        CacheInterface $cache,
        RapidApiClient $rapidApiClient
    ): Response
    {
        $countries = $cache->get('countries',
        function() use ($rapidApiClient) {
            $result = $rapidApiClient->getContent();

            return $result['response'];
        });

        return $this->render("RapidApi/country.html.twig", ['countries' => $countries]);
    }

}
