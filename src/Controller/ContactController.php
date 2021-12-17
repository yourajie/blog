<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
        /**
     * @var ContactRepository
     */
    private $contactRepository;

    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }


    /**
     * @Route("/contact/{city}", name="contact")
     */
    public function contact(Request $request, string $city = ""): Response
    {
        $name = $request->query->get('name');
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

            dump('ok en base')
        }

        return $this->renderForm
        ('contact/index.html.twig',
        [
           'controller_name' => 'Controleur de Contact',
           'city' => $city,
           'name' => $name,
           'form' => $form,
        ]
        );
    }


}
