<?php

namespace App\Service;

use App\Entity\Country;
use App\Entity\Logo;
use App\Message\DownloadLogo;
use App\Repository\CountryRepository;
use Symfony\Component\Messenger\MessageBusInterface;


class UpdateCountry
{
    public function __construct(
        private CountryRepository $countryRepository,
        private MessageBusInterface $messageBus
    )
    {
    }

    public function update(Country $country, string $flagSource = null)
    {
        if ($flagSource) {
            $country->setFlag(
                Country::FLAG_STORAGE.strtolower($country->getName().'.svg')
            );

            $this->messageBus->dispatch(
                new DownloadLogo(
                    new Logo(
                        $flagSource,
                        $country->getName()
                    )
                )
            );
        }

        $this->countryRepository->update();
    }

}
