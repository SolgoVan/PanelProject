<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeazelnewsController extends AbstractController
{
    #[Route('/weazelnews', name: 'app_weazelnews')]
    public function index(): Response
    {
        return $this->render('weazelnews/index.html.twig', [
            'controller_name' => 'WeazelnewsController',
        ]);
    }
}
