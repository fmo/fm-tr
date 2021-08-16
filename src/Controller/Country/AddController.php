<?php

namespace App\Controller\Country;

use App\Entity\Country;
use App\Form\Type\CountryType;
use App\Service\CreateCountry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddController extends AbstractController
{
    public function __construct(
        private CreateCountry $createCountry
    )
    {
    }

    public function __invoke(Request $request): Response
    {
        $country = new Country();
        $form = $this->createForm(CountryType::class, $country);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $this->createCountry->create($country, $form->get('source')->getData());

                $this->addFlash('notice', 'Country has been added!');

                return $this->redirect($this->generateUrl('countries'));
            }
        }

        return $this->render('addCountry',[
            'form' => $form->createView()
        ]);
    }
}
