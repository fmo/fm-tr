<?php

namespace App\Service;

use App\Entity\Country;
use App\Repository\CountryRepository;


class UpdateCountry
{
    public function __construct(
        private CountryRepository $countryRepository
    )
    {
    }

    public function update(Country $country, string $flagSource = null)
    {
        $this->countryRepository->update();
    }

}
