<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PopdinerController extends AbstractController
{
    #[Route('/popdiner', name: 'app_popdiner')]
    public function index(): Response
    {
        return $this->render('popdiner/index.html.twig', [
            'controller_name' => 'PopdinerController',
        ]);
    }
}
