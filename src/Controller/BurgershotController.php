<?php

namespace App\Controller;

use App\Entity\Stock;
use App\Form\StockType;
use App\Repository\SocietyRepository;
use App\Repository\StockRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BurgershotController extends AbstractController
{
    #[Route('/burgershot', name: 'app_burgershot')]
    public function index(): Response
    {
        return $this->render('burgershot/index.html.twig', [
            'controller_name' => 'BurgershotController',
        ]);
    }

    #[Route('/finance_burgershot', name: 'app_burgershot_finance')]
    public function burger_finance(SocietyRepository $societyRepository, Request $request): Response
    {
        $finance = $societyRepository->findBy(['nom'=>'Burger Shot']);


        return $this->render('burgershot/finance.html.twig',[
            "finance"=> $finance
        ]);
    }

    #[Route('/stock', name: 'app_burgershot_stock')]
    public function burger_stock(StockRepository $stockRepository, Request $request): Response
    {
        $stock1 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'base']);
        $stock2 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'prepa']);
        $stock3 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'final']);

        return $this->render('burgershot/stock.html.twig', [
            "stock1" => $stock1,
            "stock2" => $stock2,
            "stock3" => $stock3
        ]);

    }

    #[Route('/update_stock/{id}', name: 'quantite_up', methods: 'POST')]
    public function update_stock(Request $request, Stock $stock, ManagerRegistry $managerRegistry, StockRepository $stockRepository):Response
    {

        $quantite = $request->request->get('quantite');
        $stock->setQuantite($quantite);
        $em = $managerRegistry->getManager();
        $em->flush();

        $stock1 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'base']);
        $stock2 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'prepa']);
        $stock3 = $stockRepository->findBy(['entreprise' => '1', 'type' => 'final']);


        return $this->render('burgershot/stock.html.twig', [
            "stock1" => $stock1,
            "stock2" => $stock2,
            "stock3" => $stock3
        ]);


    }

    #[Route('/recettes', name:'app_burgershot_recettes')]
    public function recette()
    {
        return $this->render('burgershot/recettes.html.twig');
    }

}

/*#[Route('/modification_stock{id}', name:'app_burgershot_stock_up')]
    public function burger_stock_up(Request $request, Stock $stock, ManagerRegistry $managerRegistry): Response
    {
        $form = $this->createForm(StockType::class, $stock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $managerRegistry->getManager();
            $em->persist($stock);
            $em->flush();

            return $this->redirectToRoute('app_burgershot_stock');
        }

        return $this->render('burgershot/modifier_stock.html.twig', [
            'stockForm' => $form->createView()
        ]);
    }*/

