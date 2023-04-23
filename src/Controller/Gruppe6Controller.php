<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Gruppe6Controller extends AbstractController
{
    #[Route('/gruppe6', name: 'app_gruppe6')]
    public function index(): Response
    {
        return $this->render('gruppe6/index.html.twig', [
            'controller_name' => 'Gruppe6Controller',
        ]);
    }
}
