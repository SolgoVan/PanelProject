<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HumanelabsController extends AbstractController
{
    #[Route('/humanelabs', name: 'app_humanelabs')]
    public function index(): Response
    {
        return $this->render('humanelabs/index.html.twig', [
            'controller_name' => 'HumanelabsController',
        ]);
    }
}
