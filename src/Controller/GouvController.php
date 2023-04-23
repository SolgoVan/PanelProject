<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Performance;
use App\Entity\Society;
use App\Entity\User;
use App\Entity\Vehicle;
use App\Form\FactureType;
use App\Form\PerformanceType;
use App\Form\SocietyType;
use App\Repository\CitoyenRepository;
use App\Repository\PerformanceRepository;
use App\Repository\SocietyRepository;
use App\Repository\VehicleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GouvController extends AbstractController
{

    // Onglet Effectifs

    #[Route('/administre_gouv', name: 'app_administred_gouv')]
    public function administred(CitoyenRepository $citoyenRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $citoyenRepository->findAll();

        $citoyen = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('gouv/citoyen.html.twig', [
            "citoyens"=> $citoyen
        ]);
    }

    // Onglet entreprise

    #[Route('/entreprise', name: 'app_society')]
    public function society(SocietyRepository $societyRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $societyRepository->findSociety();

        $society = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('gouv/entreprise.html.twig', [
            "societies"=>$society
        ]);
    }

    #[Route('/detail_entreprise{id}', name: 'app_detail_entreprise')]
    public function detail_society(int $id, SocietyRepository $societyRepository) :Response
    {
        $society = $societyRepository->find($id);

        return $this->render('gouv/detail_entreprise.html.twig', [
            "society"=>$society
        ]);
    }

    #[Route('/ajout_entreprise', name: 'app_add_society')]
    public function add_society(Request $request, ManagerRegistry $managerRegistry)
    {
        $society = new Society();
        $societyForm = $this->createForm(SocietyType::class, $society);

        $societyForm->handleRequest($request);

        if ($societyForm->isSubmitted() && $societyForm->isValid()){
            $em = $managerRegistry->getManager();
            $em->persist($society);
            $em->flush();


            $this->addFlash('success', 'Entreprise ajouté !');
            return $this->redirectToRoute('app_society');
        }



        return $this->render('gouv/ajouter_entreprise.html.twig', [
            'societyForm'=>$societyForm->createView()
        ]);
    }

    #[Route('/facture_gouv', name: 'app_gouv_facture')]
    public function gouv_facture()
    {

        return $this->render('gouv/facture.html.twig');
    }

    #[Route('/ajout_facture{$id}', name: 'app_gouv_add_invoice')]
    public function add_invoice(int $id, SocietyRepository $societyRepository, Request $request, ManagerRegistry $managerRegistry)
    {

        $em = $managerRegistry->getManager();
        $entA = $em->getRepository(Society::class)->find($id);
        dd($entA);
        $facture = new Facture();
        $facture->setCrediteur($entA);



        $factureForm = $this->createForm(FactureType::class, $facture);
        $factureForm->handleRequest($request);

        if ($factureForm->isSubmitted() && $factureForm->isValid()){

            $facture = $factureForm->getData();
            $entB = $facture->getDebiteur();
            $montant = $facture->getMontant();

            $entA->setMoney($entA->getMoney() + $montant);
            $entB->setMoney($entB->gteMoney() - $montant);

            $em->persist($facture);
            $em->flush();

            //$entrepriseA->setMoney($entrepriseA->getMoney() + $facture->getMontant());
            //$em->persist($entrepriseA);


            //$entrepriseB = $em->getRepository(Society::class)->findOneBy(['id']);
            //$entrepriseB->setMoney($entrepriseB->getMoney() - $facture->getMontant());
            //$em->persist($entrepriseB);

            //$facture->setCrediteur($entrepriseA);

            //$facture->setDebiteur($entrepriseB);
            //$em->persist($facture);
            //$em->flush();



            $this->addFlash('success', 'Facture ajouté !');
            return $this->redirectToRoute('app_gouv_facture');
        }

        return $this->render('gouv/ajouter_facture.html.twig', [
            'factureForm'=>$factureForm->createView()
        ]);
    }

    #[Route('/vehicule_gouv', name: 'app_vehicle_gouv')]
    public function vehicle_fdo(VehicleRepository $vehicleRepository, PaginatorInterface $paginator, Request $request):Response
    {
        $data = $vehicleRepository->findBy(['service'=>'gouv']);

        $vehicle = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), 15
        );

        return $this->render('gouv/vehicule.html.twig', [
            "vehicles"=> $vehicle
        ]);
    }

    #[Route('/detail_vehicule_gouv{id}', name: 'app_detail_vehicle_gouv')]
    public function detail_vehicle_gouv(int $id, VehicleRepository $vehicleRepository, PerformanceRepository $performanceRepository):Response
    {
        $vehicle = $vehicleRepository->find($id);
        $perf = $performanceRepository->find($id);


        return $this->render('gouv/detail_vehicule.html.twig',[
            "vehicle" => $vehicle,
            "perf" => $perf
        ]);
    }

    #[Route('/ajouter_performance{id}', name: 'app_add_perf')]
    public function add_perf(Vehicle $vehicle, Request $request, ManagerRegistry $managerRegistry)
    {
        $perf = new Performance();

        $perfForm = $this->createForm(PerformanceType::class, $perf);
        $perfForm->handleRequest($request);

        if ($perfForm->isSubmitted() && $perfForm->isValid()){
            $em = $managerRegistry->getManager();
            $perf->setVehicle($vehicle);
            $em->persist($perf);
            $em->flush();

            $this->addFlash('success', 'Performance ajouté !');
            return $this->redirectToRoute('app_vehicle_gouv');
        }


        return $this->render('gouv/ajouter_performance.html.twig', [
            'perfForm'=>$perfForm->createView()
        ]);
    }



    #[Route('/finance_gouv', name: 'app_gouv_finance')]
    public function gouv_finance(SocietyRepository $societyRepository, Request $request): Response
    {
        $finance = $societyRepository->findBy(['nom'=>'Gouvernement']);


        return $this->render('gouv/finance.html.twig',[
            "finance"=> $finance
        ]);
    }


}
