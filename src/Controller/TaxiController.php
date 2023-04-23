<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaxiController extends AbstractController
{
    #[Route('/taxi', name: 'app_taxi')]
    public function index(): Response
    {
        return $this->render('taxi/index.html.twig', [
            'controller_name' => 'TaxiController',
        ]);
    }
}
