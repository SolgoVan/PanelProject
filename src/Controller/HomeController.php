<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Form\CitizenType;
use App\Repository\CitoyenRepository;
use App\Repository\OffenseRepository;

use App\Repository\VehicleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home()
    {
        return $this->redirectToRoute('app_home_ems');
    }

    /* Accueil EMS*/

    #[Route('/ems', name: 'app_home_ems')]
    public function index_ems(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_EMS');

        return $this->render('ems/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }



    /* Accueil FDO*/

    #[Route('/fdo', name: 'app_home_fdo')]
    public function index_fdo(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_FDO');

        return $this->render('fdo/index.html.twig');
    }


    /* Accueil GOUV*/

    #[Route('/gouv', name: 'app_home_gouv')]
    public function index_gouv(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_GOV');

        return $this->render('gouv/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/admin', name: 'app_home_admin')]
    public function index_admin(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        return $this->render('tool/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil BurgerShot*/

    #[Route('/burgershot', name: 'app_home_burgershot')]
    public function index_burgershot(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_BURGER');

        return $this->render('burgershot/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Benny's */

    #[Route('/bennys', name: 'app_home_bennys')]
    public function index_bennys(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_BENNYS');

        return $this->render('bennys/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Weazel news */

    #[Route('/weazelnews', name: 'app_home_weazel')]
    public function index_weazel(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_WEAZEL');

        return $this->render('weazelnews/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Roger's */

    #[Route('/rogers', name: 'app_home_rogers')]
    public function index_rogers(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ROGERS');

        return $this->render('rogers/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Pop Diner */

    #[Route('/diner', name: 'app_home_diner')]
    public function index_diner(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_DINER');

        return $this->render('popdiner/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Valley Farm */

    #[Route('/farm', name: 'app_home_farm')]
    public function index_farm(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_FARM');

        return $this->render('valleyfarm/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Los Santos Taxi */

    #[Route('/taxi', name: 'app_home_taxi')]
    public function index_taxi(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_TAXI');

        return $this->render('taxi/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Humane Labs */

    #[Route('/humane', name: 'app_home_humane')]
    public function index_humane(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_HUMANE');

        return $this->render('humanelabs/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /* Accueil Gruppe 6 */

    #[Route('/gruppe', name: 'app_home_gruppe')]
    public function index_gruppe(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_GRUPPE');

        return $this->render('gruppe6/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
