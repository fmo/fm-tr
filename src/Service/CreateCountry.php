<?php

namespace App\Service;

use App\Entity\Country;
use App\Repository\CountryRepository;

class CreateCountry
{
    public function __construct(
        private CountryRepository $countryRepository
    )
    {
    }

    public function create(Country $country, $flagSource = null)
    {
        $this->countryRepository->save($country);
    }

}
