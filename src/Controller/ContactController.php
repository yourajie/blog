<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact/{city}", name="contactCity")
     */
    public function contactcity(Request $request, string $city = ""): Response
    {

        return $this->render('contact/index.html.twig',[
            'name' =>"montpellier",
            'city' =>$city,
        ]);
    }
}
