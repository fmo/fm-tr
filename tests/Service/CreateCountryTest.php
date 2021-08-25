<?php

namespace App\Tests\Service;

use App\Entity\Country;
use App\Entity\Logo;
use App\Message\DownloadLogo;
use App\Repository\CountryRepository;
use App\Service\CreateCountry;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateCountryTest extends TestCase
{
    public function testCreate()
    {
        $countryRepository = $this->createMock(CountryRepository::class);
        $messageBus = $this->createMock(MessageBusInterface::class);

        $message = new DownloadLogo(
            new Logo(
                'aws://s3', 'Spain'
            )
        );

        $messageBus->expects(self::once())
            ->method('dispatch')
            ->willReturn(new Envelope($message));

        $countryRepository->expects(self::once())
            ->method('save');

        $country = (new Country())->setName("Spain");

        $countryService = new CreateCountry($countryRepository, $messageBus);

        $countryService->create($country, 'aws://s3');
    }
}
