<?php

namespace App\Controller\Country;

use App\Entity\Country;
use App\Form\Type\CountryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);
    }
}
