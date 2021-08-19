<?php

namespace App\Controller\Country;

use App\Entity\Country;
use App\Service\RemoveCountry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RemoveController extends AbstractController
{
    public function __construct(
        private RemoveCountry $removeCountry
    )
    {
    }

    public function __invoke(Country $country): Response
    {
        $this->removeCountry->remove($country);

        $this->addFlash('notice', 'Country has been deleted');

        return $this->redirect($this->generateUrl('countries'));
    }
}
