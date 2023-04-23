<?php

namespace App\Controller;

use App\Entity\Citoyen;
use App\Form\CitizenType;
use App\Repository\CitoyenRepository;
use App\Repository\OffenseRepository;
use App\Repository\PermisRepository;
use App\Repository\VehicleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FdoController extends AbstractController
{
    #[Route('/effectif_fdo', name: 'app_effectif_fdo')]
    public function effectif_efdo(CitoyenRepository $citoyenRepository, Request $request): Response
    {
        $effectif = $citoyenRepository->findBy(['groupjobs' => '2']);

        return $this->render('fdo/effectif.html.twig', [
            "effectif"=>$effectif
        ]);
    }

    #[Route('/team', name: 'app_team_fdo')]
    public function team_fdo(): Response
    {
        return $this->render('fdo/team.html.twig');
    }

    #[Route('/citizen', name: 'app_citizen')]
    public function citizen(CitoyenRepository $citoyenRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $citoyenRepository->findAlpha();

        $citoyen = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('fdo/citoyen.html.twig', [
            "citoyens"=> $citoyen
        ]);
    }

    #[Route('/detail_citoyen{id}', name: 'app_detail')]
    public function detail_citoyen(int $id, CitoyenRepository $citoyenRepository, PermisRepository $permisRepository):Response
    {
        $citoyen = $citoyenRepository->find($id);
        $permis  = $permisRepository->findBy(['citoyen'=> $id]);

        return $this->render('fdo/detail_citoyen.html.twig', [
            "citoyen" => $citoyen,
            "permis"  => $permis
        ]);
    }

    #[Route('/offense', name: 'app_offense')]
    public function offense(OffenseRepository $offenseRepository, PaginatorInterface $paginator,Request $request):Response
    {
        $data = $offenseRepository->findAll();

        $offenses = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('fdo/offense.html.twig', [
            "offenses"=> $offenses
        ]);
    }
    #[Route('/ajout', name: 'app_add_citizen')]
    public function add(Request $request, ManagerRegistry $managerRegistry)
    {
        $citizen = new Citoyen();
        $citizenForm = $this->createForm(CitizenType::class, $citizen);

        $citizenForm->handleRequest($request);

        if ($citizenForm->isSubmitted() && $citizenForm->isValid()){
            $em = $managerRegistry->getManager();
            $em->persist($citizen);
            $em->flush();

            $this->addFlash('success', 'Citoyen ajouté !');
            return $this->redirectToRoute('app_citizen');
        }

        return $this->render('fdo/ajouter.html.twig',[
            'citizenForm'=>$citizenForm->createView()
        ]);
    }

    #[Route('/vehicule_fdo', name: 'app_vehicle_fdo')]
    public function vehicle_fdo(VehicleRepository $vehicleRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $vehicleRepository->findBy(['service'=>'lspd']);

        $vehicle = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('fdo/vehicule.html.twig', [
            "vehicles"=> $vehicle
        ]);
    }

    #[Route('/detail_vehicule_fdo{id}', name: 'app_detail_vehicle_fdo')]
    public function detail_vehicle_ems(int $id, VehicleRepository $vehicleRepository):Response
    {
        $vehicle = $vehicleRepository->find($id);

        return $this->render('fdo/detail_vehicule.html.twig',[
            "vehicle" => $vehicle
        ]);
    }
}
