<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RogersController extends AbstractController
{
    #[Route('/rogers', name: 'app_rogers')]
    public function index(): Response
    {
        return $this->render('rogers/index.html.twig', [
            'controller_name' => 'RogersController',
        ]);
    }
}
