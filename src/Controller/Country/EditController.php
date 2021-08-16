<?php

namespace App\Controller\Country;

use App\Entity\Country;
use App\Form\Type\CountryType;
use App\Service\UpdateCountry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditController extends AbstractController
{
    public function __construct(
        private UpdateCountry $updateCountry
    )
    {
    }

    public function __invoke(
        Country $country,
        Request $request
    ): Response
    {
        $form = $this->createForm(CountryType::class, $country);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $this->updateCountry->update($country, $form->get('source')->getData());
            }

            $this->addFlash('notice', 'Country has been changed');

            return $this->redirect($this->generateUrl('countries'));
        }

        return $this->render('country/edit.html.twig', ['form' => $form->createView()]);

    }


}
