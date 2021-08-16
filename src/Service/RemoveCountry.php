<?php

namespace App\Service;

use App\Entity\Country;
use App\Repository\CountryRepository;

class RemoveCountry
{
    public function __construct(
        private CountryRepository $countryRepository
    )
    {
    }

    public function remove(Country $country)
    {
        $this->countryRepository->remove($country);
    }
}
