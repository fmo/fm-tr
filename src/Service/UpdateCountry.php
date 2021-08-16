<?php

namespace App\Service;

use App\Repository\CountryRepository;
use Symfony\Component\Validator\Constraints\Country;

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
