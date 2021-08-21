<?php

namespace App\Controller\Country;

use App\Exception\NoCountryException;
use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ListController extends AbstractController
{
    public function __construct(
        private CountryRepository $countryRepository
    )
    {
    }

    public function __invoke(): Response
    {
        $countries = $this->countryRepository->findAll();

        if (!$countries) {
            throw new NoCountryException("No country found");
        }

        return $this->render('Country/list.html.twig', [
            'countries' => $countries
        ]);
    }
}
