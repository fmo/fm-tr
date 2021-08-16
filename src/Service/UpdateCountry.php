<?php

namespace App\Service;

use App\Repository\CountryRepository;

class UpdateCountry
{
    public function __construct(
        private CountryRepository $countryRepository
    )
    {
    }

    public function update()
    {
        $this->countryRepository->update();
    }

}
